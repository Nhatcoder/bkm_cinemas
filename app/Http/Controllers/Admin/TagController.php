<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\TagRequest;
use App\Services\Admin\Tags\Interfaces\TagServiceInterface;
use App\Services\Admin\Tags\TagService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{
    protected $tagService;
    public function __construct(
        TagServiceInterface $tagService,
    ) {
        $this->tagService = $tagService;
    }

    public function index(Request $request)
    {
        $data = $this->tagService->getAll();

        return view('admin.pages.tags.index', compact('data'));
    }
    public function create()
    {
        return view('admin.pages.tags.create');
    }

    public function changeActive(Request $request)
    {
        $item = $this->tagService->changeActive($request);

        return response()->json(['newStatus' => $item->active]);
    }
    public function changeOrder(Request $request)
    {
        $this->tagService->changeOrder($request);

        return response()->json(['newOrder' => $request->order]);
    }

    public function store(TagRequest $request)
    {
        try {
            DB::beginTransaction();

            $this->tagService->create($request);

            DB::commit();

            $redirectUrl = route('admin.tags.index');

            return redirect($redirectUrl)->with([
                'status_succeed' => "Thêm thẻ thành công"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with([
                'status_failed' => 'Đã xảy ra lỗi khi thêm'
            ]);
        }
    }
    public function edit($id)
    {
        $tag = $this->tagService->find($id);

        if (!$tag) {
            return redirect()->route('admin.tags.index')->with([
                'status_failed' => 'Không tìm thấy danh mục'
            ]);
        }

        return view('admin.pages.tags.edit', compact('tag'));
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            $this->tagService->delete($id);

            DB::commit();

            $redirectUrl = route('admin.tags.index');

            return redirect($redirectUrl)->with([
                'status_succeed' => 'Xóa thẻ thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with([
                'status_failed' => 'Đã xảy ra lỗi khi xóa'
            ]);
        }
    }

    public function update(TagRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $this->tagService->update($request, $id);

            DB::commit();

            $redirectUrl = route('admin.tags.index');

            return redirect($redirectUrl)->with([
                'status_succeed' => 'Cập nhật thẻ thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with([
                'status_failed' => 'Đã xảy ra lỗi khi cập nhật'
            ]);
        }
    }
    public function deleteItemMultipleChecked(Request $request)
    {
        try {
            DB::beginTransaction();
            if (empty($request->selectedIds)) {
                return response()->json(['message' => 'Vui lòng chọn ít nhất 1 bản ghi'], 400);
            }
            $this->tagService->deleteMultipleChecked($request);

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
