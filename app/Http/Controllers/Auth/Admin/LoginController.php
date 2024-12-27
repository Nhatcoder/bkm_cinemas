<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Admin\LoginRequest;
use App\Models\User;
use App\Services\Auth\Admin\Logins\Interfaces\LoginServiceInterface;
use App\Services\Auth\Admin\Logins\LoginService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(
        LoginServiceInterface $loginService
    )
    {
        $this->loginService = $loginService;
    }

    public function login()
    {
        return view('auth.admin.pages.login');
    }

    public function loginSubmit(LoginRequest $request)
    {
        try {
            // Kiểm tra email tồn tại trong hệ thống
            $user = $this->loginService->checkEmailGuard($request->email);

            if (!$user) {
                return back()->with([
                    'status_failed' => 'Email không tồn tại trong hệ thống.'
                ]);
            }

            if($user->status == 0) {
                return back()->with([
                    'status_failed' => 'Tài khoản của bạn đã bị khóa!'
                ]);
            }

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                if (Auth::user()->isAdminGuard()) {
                    if (Auth::user()->type == User::TYPE_STAFF) {
                        return redirect()->route('admin.orders.index')->with([
                            'status_succeed' => 'Xin chào ' . Auth::user()->name . ' đến với hệ thống quản trị'
                        ]);
                    } else {
                        return redirect()->route('admin.dashboard')->with([
                            'status_succeed' => 'Xin chào ' . Auth::user()->name . ' đến với hệ thống quản trị'
                        ]);
                    }
                }
            }

            return back()->with([
                'status_failed' => 'Mật khẩu không đúng.'
            ]);

        } catch (\Exception $e) {
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with([
                'status_failed' => 'Đã xảy ra lỗi trong quá trình đăng nhập.'
            ]);
        }
    }

    public function logout()
    {
        try {
            Auth::logout();

            return redirect()->route('admin.login')->with([
                'status_succeed' => 'Đăng xuất thành công'
            ]);
        } catch (\Exception $e) {
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with([
                'status_failed' => 'Đã xảy ra lỗi'
            ]);
        }
    }
}
