<?php

namespace App\Http\Controllers\Admin\Members;

use App\Http\Controllers\Controller;
use App\Http\Requests\Modules\ModuleRequest;
use App\Services\Admin\Modules\Interfaces\ModuleServiceInterface;
use App\Services\Admin\Permissions\Interfaces\PermissionServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ModuleController extends Controller
{
    protected $moduleServices;
    protected $permissionServices;

    public function __construct(
        ModuleServiceInterface $moduleServices,
        PermissionServiceInterface $permissionServices,
    )
    {
        $this->moduleServices = $moduleServices;
        $this->permissionServices = $permissionServices;
    }

    public function index(Request $request)
    {
        if ($request->query('page')) {
            $currentPage = $request->query('page', 1);
        }

        session([
            'page' => $currentPage ?? null,
        ]);

        $data['modules'] = $this->moduleServices->filter($request);

        return view('admin.pages.members.modules.index', compact('data'));
    }

    public function create()
    {
        $data['permissions'] = $this->permissionServices->getAll();

        return view('admin.pages.members.modules.create', compact('data'));
    }

    public function store(ModuleRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();

            $this->moduleServices->create($data);

            DB::commit();

            $currentPage = session('page', 1);

            $redirectUrl = route('admin.modules.index', [
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
        $data['module'] = $this->moduleServices->find($id);
        if (!$data['module']) {
            return redirect()->route('admin.modules.index')->with(['status_failed' => 'Không tìm thấy!']);
        }
        $data['permissions'] = $this->permissionServices->getAll();

        return view('admin.pages.members.modules.edit', compact('data'));
    }

    public function update(ModuleRequest $request, $id)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();

            if (!$this->moduleServices->update($data, $id)) {
                return redirect()->route('admin.modules.index')->with(['status_failed' => 'Không tìm thấy!']);
            }

            DB::commit();

            $currentPage = session('page', 1);

            $redirectUrl = route('admin.modules.index', [
                'page' => $currentPage,
            ]);

            return redirect($redirectUrl)->with([
                'status_succeed' => "Cập nhật module thành công."
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi cập nhật.');
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            $this->moduleServices->delete($id);

            DB::commit();

            $currentPage = session('page', 1);

            $redirectUrl = route('admin.modules.index', [
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
        $this->moduleServices->deleteMultipleChecked($request);

        return response()->json(['message' => 'Xóa thành công!']);
    }
}
