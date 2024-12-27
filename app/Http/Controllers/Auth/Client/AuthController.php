<?php

namespace App\Http\Controllers\Auth\Client;

use App\Events\Client\ForgotPasswordRequested;
use App\Events\Client\PasswordChanged;
use App\Events\Client\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Client\ChangePasswordRequest;
use App\Http\Requests\Auth\Client\ForgotPasswordRequest;
use App\Http\Requests\Auth\Client\LoginRequest;
use App\Http\Requests\Auth\Client\RegisterRequest;
use App\Http\Requests\Auth\Client\ResetPasswordRequest;
use App\Http\Requests\Auth\Client\UpdateProfileRequest;
use App\Models\Transaction;
use App\Repositories\Auth\Client\ChangePasswords\Interfaces\ChangePasswordInterface;
use App\Repositories\Auth\Client\ForgotPasswords\Interfaces\ForgotPasswordInterface;
use App\Services\Client\Rewards\Interfaces\RewardServiceInterface;
use App\Services\Auth\Client\Registers\Interfaces\RegisterServiceInterface;
use App\Services\Client\Bookings\Interfaces\BookingServiceInterface;
use App\Services\Client\Cities\Interfaces\CityServiceInterface;
use App\Services\Client\Transactions\Interfaces\TransactionServiceInterface;
use App\Services\Client\Users\Interfaces\UserServiceInterface;
use App\Services\Client\Vouchers\Interfaces\VoucherServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    protected $cityService;

    protected $registerService;

    protected $forgotPassword;

    protected $changePassword;

    protected $transactionService;

    protected $userService;

    protected $rewardService;
    protected $voucherService;
    protected $bookingService;
    
    public function __construct(
        CityServiceInterface            $cityService,
        RegisterServiceInterface        $registerService,
        ForgotPasswordInterface         $forgotPassword,
        ChangePasswordInterface         $changePassword,
        TransactionServiceInterface     $transactionService,
        UserServiceInterface            $userService,
        RewardServiceInterface          $rewardService,
        BookingServiceInterface         $bookingService,
        VoucherServiceInterface         $voucherService
    ) {
        $this->cityService = $cityService;
        $this->registerService = $registerService;
        $this->forgotPassword = $forgotPassword;
        $this->changePassword = $changePassword;
        $this->transactionService = $transactionService;
        $this->userService = $userService;
        $this->rewardService = $rewardService;
        $this->bookingService = $bookingService;
        $this->voucherService = $voucherService;
    }

    public function account(Request $request)
    {
        $data['cities'] = $this->cityService->getAll();

        if (Auth::check()) {
            $userId = Auth::user()->id ?? 0;
            $date = $request->date;

            $data['transactions'] = $this->transactionService->getTransactionByUser($userId);

            $data['tickets'] = $this->bookingService->getTicketsByUserId($userId, $date);

            $data['rewards'] = $this->rewardService->getAll();
            $data['voucherUsers'] = $this->voucherService->getAllVoucherByUserId($userId);

            $data['rewardsUser'] = $this->rewardService->getRewardsByUserId($userId);

            if ($request->ajax()) {
                if ($data['tickets']->isEmpty()) {
                    return response()->json([
                        'tbody' => view('client.ajax.tickets.no-ticket', [
                            'date' => $date
                        ])->render()
                    ]);
                }   

                return response()->json([
                    'tbody' => view('client.ajax.tickets.ticket', [
                        'tickets' => $data['tickets'],
                    ])->render(),
                    'pagination' => view('client.ajax.tickets.pagination', [
                        'tickets' => $data['tickets'],
                    ])->render(),
                ]);
            }
        }

        return view('client.pages.auth.auth', compact('data'));
    }

    public function login(LoginRequest $request)
    {
        try {
            $loginType = filter_var($request->emailOrPhone, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

            $credentials = [
                $loginType => $request->emailOrPhone,
                'password' => $request->password
            ];

            $remember = $request->has('remember');

            if (Auth::attempt($credentials, $remember)) {
                $user = Auth::user();
                $token = $user->createToken('AuthToken')->plainTextToken;

                if ($user->created_at > now()->subDays(7)) {
                    $user->is_new_member = 1; 
                } else {
                    $user->is_new_member = 0;
                }

                $user->save();

                return response()->json([
                    'status' => true,
                    'message' => 'Đăng nhập thành công.',
                    'user' => $user,
                    'token' => $token,
                    'url' => route('home')
                ], Response::HTTP_OK);
            }

            return response()->json([
                'status' => false,
                'message' => 'Thông tin đăng nhập không chính xác.'
            ], Response::HTTP_UNAUTHORIZED);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $this->registerService->create($request);

            UserRegistered::dispatch($user);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Đăng ký tài khoản thành công!'
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            DB::rollBack();

            Log::error('Lỗi đăng ký người dùng', [
                'message' => $exception->getMessage(),
                'trace' => $exception->getTrace()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Đã xảy ra lỗi trong quá trình đăng ký. Vui lòng thử lại sau.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function logout(Request $request)
    {
        try {
            $user = $request->user();

            if ($user) {
                $user->tokens()->delete();
            }

            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('home');
        } catch (\Exception $e) {
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return redirect()->route('home')->withErrors('Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }

    public function sendResetLinkEmail(ForgotPasswordRequest $request)
    {
        try {
            $user = $this->forgotPassword->getUserByEmail($request->email);

            $token = Str::random(60);

            $this->forgotPassword->updateOrInsert(
                ['email' => $user->email],
                ['token' => $token, 'created_at' => now()]
            );

            ForgotPasswordRequested::dispatch($token, $user);

            return response()->json([
                'sendResetLink' => true,
                'message' => 'Yêu cầu thay đổi mật khẩu đã được gửi đến email của bạn. Vui lòng kiểm tra lại email.',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'sendResetLink' => false,
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function forgotPassword(Request $request)
    {
        $token = $request->query('code');
        $email = $request->query('email');

        session(['reset_token' => $token, 'reset_email' => $email]);

        return view('client.pages.auth.forgot-password', [
            'token' => $token,
            'email' => $email
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        try {
            $token = session('reset_token');
            $email = session('reset_email');

            if (!$token || !$email) {
                return response()->json([
                    'sendResetPassword' => false,
                    'message' => 'Token hết hạn hoặc không hợp lệ. Vui lòng thử lại.',
                ], 401);
            }

            $reset = $this->forgotPassword->getResetToken($token, $email);

            if (!$reset) {
                return response()->json([
                    'sendResetPassword' => false,
                    'message' => 'Đường dẫn đặt lại mật khẩu đã hết hạn. Vui lòng thử lại.',
                ], 401);
            }

            $user = $this->forgotPassword->getUserByEmail($reset->email);

            if ($user) {
                $this->forgotPassword->update($user->id, [
                    'password' => Hash::make($request->password),
                ]);
            }

            $this->forgotPassword->deleteByToken($token);

            session()->forget(['reset_token', 'reset_email']);

            return response()->json([
                'sendResetPassword' => true,
                'message' => 'Mật khẩu đã được thay đổi thành công.',
                'url' => route('account'),
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'sendResetPassword' => false,
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        try {
            $this->changePassword->update(Auth::user()->id, [
                'password' => Hash::make($request->password)
            ]);

            PasswordChanged::dispatch(Auth::user());

            return response()->json([
                'status' => true,
                'message' => 'Mật khẩu đã được thay đổi thành công.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateAvatar(Request $request)
    {
        $data = $request->user;
        try {
            DB::beginTransaction();

            $data['image'] = $this->userService->update($data, Auth::user()->id);

            DB::commit();

            return response()->json([
                'code' => 1,
                'status' => true,
                'imageUrl' => $data['image']
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return response()->json([
                'code' => 0,
                'status' => false,
            ]);
        }
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = [
                'name' => $request->name,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => Auth::user()->email ?? null,
                'phone' => Auth::user()->phone ?? null,
                'gender' => $request->gender,
                'date_birth' => Carbon::createFromFormat('d-m-Y', $request->date_birth)->format('Y-m-d'),
                'city_id' => $request->city_id,
            ];

            $this->userService->updateProfile($data, Auth::user()->id);

            DB::commit();

            return response()->json([
                'status' => true,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return response()->json([
                'status' => false,
            ]);
        }
    }

    public function redeem(Request $request)
    {
        try {
            DB::beginTransaction();

            if (Auth::user()->points < $request->points_spent) {
                return response()->json([
                    'status' => false,
                    'message' => 'Điểm tích lũy của bạn không đủ để đổi món quà này.'
                ]);
            }

            $reward = $this->rewardService->redeemRewards($request);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Đổi quà thành công.',
                'points' => number_format($reward['points'], 0, ',', '.'),
                'reward' => [
                    'code' => $reward['code'],
                    'name' => $reward['name'],
                    'image' => $reward['image'],
                    'status' => $reward['status']
                ],
                'userRewardsCount' => $reward['userRewardsCount']
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return response()->json([
                'status' => false,
                'message' => 'Đã xảy ra lỗi'
            ]);
        }
    }

    public function getTotalMoneyByYear(Request $request){
        $totalPendingByUser = $this->transactionService->getTotalMoneyByYear($request);
        return $totalPendingByUser;
    }
    public function getTotalMoneyByMonth(Request $request){
        $totalPendingUserByMonth = $this->transactionService->getTotalMoneyByMonth($request);
        return $totalPendingUserByMonth;
    }
    
}
