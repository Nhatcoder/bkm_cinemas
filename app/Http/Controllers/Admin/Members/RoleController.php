<?php

namespace App\Http\Controllers\Admin\Members;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\RoleRequest;
use App\Models\Role;
use App\Services\Admin\Modules\Interfaces\ModuleServiceInterface;
use App\Services\Admin\Roles\Interfaces\RoleServiceInterface;
use App\Traits\RemoveImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    use RemoveImageTrait;
    protected $roleService;
    protected $moduleService;

    public function __construct(
        RoleServiceInterface $roleService,
        ModuleServiceInterface $moduleService,
    ) {
        $this->roleService = $roleService;
        $this->moduleService = $moduleService;
    }

    public function index(Request $request)
    {
        if ($request->query('page')) {
            $currentPage = $request->query('page', 1);
        }

        session([
            'page' => $currentPage ?? null,
        ]);

        $data['roles'] = $this->roleService->getAll();
        return view('admin.pages.members.roles.index', compact('data'));
    }

    public function create()
    {
        $data['modules'] = $this->moduleService->getModule();
        return view('admin.pages.members.roles.create', compact('data'));
    }

    public function store(RoleRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();

            $this->roleService->create($data);

            DB::commit();

            $currentPage = session('page', 1);

            $redirectUrl = route('admin.roles.index', [
                'page' => $currentPage,
            ]);

            return redirect($redirectUrl)->with([
                'status_succeed' => "Thêm mới thành công"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi thêm');
        }
    }

    public function edit($id)
    {
        $data['role'] = $this->roleService->find($id);
        $data['modules'] = $this->moduleService->getModule();

        return view('admin.pages.members.roles.edit', compact('data'));
    }

    public function update(RoleRequest $request, $id)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();

            $this->roleService->update($data, $id);

            DB::commit();

            $currentPage = session('page', 1);

            $redirectUrl = route('admin.roles.index', [
                'page' => $currentPage,
            ]);

            return redirect($redirectUrl)->with([
                'status_succeed' => "Cập nhật thành công"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi cập nhật');
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            $this->roleService->delete($id);

            DB::commit();

            $currentPage = session('page', 1);

            $redirectUrl = route('admin.roles.index', [
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
        $role = $this->removeImage($request, new Role, 'image', 'roles');

        return response()->json(['image' => $role]);
    }
}
