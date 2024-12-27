<?php

namespace App\Http\Controllers\Admin\Members;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserRequest;
use App\Models\User;
use App\Services\Admin\Cinemas\Interfaces\CinemaServiceInterface;
use App\Services\Admin\Cities\Interfaces\CityServiceInterface;
use App\Services\Admin\Roles\Interfaces\RoleServiceInterface;
use App\Services\Admin\Users\Interfaces\UserServiceInterface;
use App\Traits\RemoveImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    use RemoveImageTrait;
    protected $userService;
    protected $roleService;
    protected $cinemaService;
    protected $cityService;

    public function __construct(
        UserServiceInterface    $userService,
        RoleServiceInterface    $roleService,
        CinemaServiceInterface  $cinemaService,
        CityServiceInterface  $cityService
    )
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->cinemaService = $cinemaService;
        $this->cityService = $cityService;
    }

    public function index(Request $request)
    {
        if ($request->query('page')) {
            $currentPage = $request->query('page', 1);
        }

        session([
            'page' => $currentPage ?? null,
        ]);

        $data['users'] = $this->userService->filter($request);
        $cities = $this->cityService->getAll();
        $cinemas = $this->cinemaService->getAllActive();

        return view('admin.pages.members.users.index', compact('data', 'cities', 'cinemas'));
    }

    public function create()
    {
        $data['roles'] = $this->roleService->getAll();

        $data['cinemas'] = $this->cinemaService->getAll();

        return view('admin.pages.members.users.create', compact('data'));
    }

    public function store(UserRequest $request)
    {
        try {
            DB::beginTransaction();

            $this->userService->create($request);

            DB::commit();

            $currentPage = session('page', 1);

            $redirectUrl = route('admin.users.index', [
                'page' => $currentPage,
            ]);

            return redirect($redirectUrl)->with([
                'status_succeed' => "Thêm mới thành công"
            ]);
        } catch(\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi thêm');
        }
    }

    public function edit($id)
    {
        $data['user'] = $this->userService->find($id);

        if (!$data['user']) {
            return redirect()->route('admin.users.index')->with('status_failed', 'Không tìm thấy người dùng');
        }

        $data['roles'] = $this->roleService->getAll();

        $data['cinemas'] = $this->cinemaService->getAll();

        return view('admin.pages.members.users.edit', compact('data'));
    }

    public function update(UserRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $this->userService->update($request, $id);

            DB::commit();

            $currentPage = session('page', 1);

            $redirectUrl = route('admin.users.index', [
                'page' => $currentPage
            ]);

            return redirect($redirectUrl)->with([
                'status_succeed' => "Cập nhật thành công"
            ]);
        } catch(\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi cập nhật');
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            $this->userService->delete($id);

            DB::commit();

            $currentPage = session('page', 1);

            $redirectUrl = route('admin.users.index', [
                'page' => $currentPage,
            ]);

            return redirect($redirectUrl)->with([
                'status_succeed' => "Xóa thành công"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi xóa');
        }
    }

    public function removeAvatarImage(Request $request)
    {
        $system = $this->removeImage($request, new User, 'image', 'users');

        return response()->json(['image' => $system]);
    }

    public function changeStatus(Request $request)
    {
        $user = $this->userService->changeStatus($request);

        return response()->json(['status' => $user->status]);
    }
}
