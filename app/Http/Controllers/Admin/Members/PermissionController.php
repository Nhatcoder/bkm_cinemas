<?php

namespace App\Http\Controllers\Admin\Members;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permissions\PermissionRequest;
use App\Services\Admin\Modules\Interfaces\ModuleServiceInterface;
use App\Services\Admin\Permissions\Interfaces\PermissionServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
    protected $permissionService;
    protected $moduleService;

    public function __construct(
        PermissionServiceInterface $permissionService,
        ModuleServiceInterface     $moduleService,
    )
    {
        $this->permissionService = $permissionService;
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

        $data['permissions'] = $this->permissionService->filter($request);

        return view('admin.pages.members.permissions.index', compact('data'));
    }

    public function create()
    {
        $data['modules'] = $this->moduleService->getAll();

        return view('admin.pages.members.permissions.create', compact('data'));
    }

    public function store(PermissionRequest $request)
    {
        $data = $request->permission;
        try {
            DB::beginTransaction();

            $this->permissionService->create($data);

            DB::commit();

            $currentPage = session('page', 1);

            $redirectUrl = route('admin.permissions.index', [
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
        $data['permission'] = $this->permissionService->find($id);

        $data['modules'] = $this->moduleService->getAll();

        return view('admin.pages.members.permissions.edit', compact('data'));
    }

    public function update(PermissionRequest $request, $id)
    {
        $data = $request->permission;

        try {
            DB::beginTransaction();

            $this->permissionService->update($data, $id);

            DB::commit();

            $currentPage = session('page', 1);

            $redirectUrl = route('admin.permissions.index', [
                'page' => $currentPage,
            ]);

            return redirect($redirectUrl)->with([
                'status_succeed' => "Cập nhật thành công"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi cập nhật');
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            $this->permissionService->delete($id);

            DB::commit();

            $currentPage = session('page', 1);

            $redirectUrl = route('admin.permissions.index', [
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
    public function deleteItemMultipleChecked(Request $request)
    {
        if (empty($request->selectedIds)) {
            return response()->json(['message' => 'Vui lòng chọn ít nhất 1 bản ghi'], 400); // Trả về mã lỗi 400
        }
        $this->permissionService->deleteMultipleChecked($request);

        return response()->json(['message' => 'Xóa thành công!']);
    }
}
