<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Systems\SystemRequest;
use App\Models\System;
use App\Services\Admin\Systems\Interfaces\SystemServiceInterface;
use App\Traits\RemoveImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SystemController extends Controller
{
    use RemoveImageTrait;
    protected $systemService;

    protected $helper;

    public function __construct(
        SystemServiceInterface $systemService,
        Helper        $helper,
    )
    {
        $this->systemService = $systemService;
        $this->helper = $helper;
    }

    public function index(Request $request)
    {
        if ($request->query('page')) {
            $currentPage = $request->query('page', 1);
        }

        if ($request->query('system_id')) {
            $systemId = $request->query('system_id', null);
        }

        session([
            'page' => $currentPage ?? null,
            'system_id' => $systemId ?? null
        ]);

        $title = $this->helper->titleHelper($request);

        $systemByType0 = $this->systemService->getAllSystemByType0($request);

        $systemBySystemId = $this->systemService->getAllSystemBySystemId($request);

        return view('admin.pages.systems.index', compact(
            'title',
            'systemByType0',
            'systemBySystemId'
        ));
    }

    public function create(Request $request)
    {
        $title = $this->helper->titleHelper($request);

        return view('admin.pages.systems.create', compact('title'));
    }

    public function store(SystemRequest $request)
    {
        try {
            DB::beginTransaction();

            $this->systemService->create($request);

            DB::commit();

            $currentPage = session('page', 1);

            $systemId = session('system_id', null);

            $redirectUrl = route('admin.systems.index', [
                'page' => $currentPage,
                'system_id' => $systemId
            ]);

            return redirect($redirectUrl)->with([
                'status_succeed' => "Thêm mới thành công"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi thêm');
        }
    }

    public function edit(Request $request, $id)
    {
        $system = $this->systemService->find($id);

        if (!$system) {
            return redirect()->route('admin.systems.index')->with('status_failed', 'Không tìm thấy nội dung');
        }

        $title = $this->helper->titleHelper($request);

        return view('admin.pages.systems.edit', compact('title', 'system'));
    }
    public function update(SystemRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $this->systemService->update($request, $id);

            DB::commit();

            $currentPage = session('page', 1);

            $systemId = session('system_id', null);

            $redirectUrl = route('admin.systems.index', [
                'page' => $currentPage,
                'system_id' => $systemId
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

            $this->systemService->delete($id);

            DB::commit();

            $currentPage = session('page', 1);

            $systemId = session('system_id', null);

            $redirectUrl = route('admin.systems.index', [
                'page' => $currentPage,
                'system_id' => $systemId
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
        $system = $this->removeImage($request, new System(), 'image', 'systems');

        return response()->json(['image' => $system]);
    }

    public function changeOrder(Request $request)
    {
        $this->systemService->changeOrder($request);

        return response()->json(['newOrder' => $request->order]);
    }

    public function changeActive(Request $request)
    {
        $item = $this->systemService->changeActive($request);

        return response()->json(['newStatus' => $item->active]);
    }

    public function deleteItemMultipleChecked(Request $request)
    {
        try {
            DB::beginTransaction();
            if (empty($request->selectedIds)) {
                return response()->json(['message' => 'Vui lòng chọn ít nhất 1 bản ghi'], 400);
            }
            $this->systemService->deleteMultipleChecked($request);

            DB::commit();
            return response()->json(['message' => 'Xóa thành công!'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra!',
            ], 500);
        }
    }
}
