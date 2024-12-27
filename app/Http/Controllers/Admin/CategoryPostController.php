<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryPosts\CategoryPostRequest;
use App\Models\CategoryPost;
use App\Services\Admin\CategoryPosts\Interfaces\CategoryPostServiceInterface;
use App\Traits\RemoveImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryPostController extends Controller
{
    use RemoveImageTrait;
    protected $categoryPostService;

    public function __construct(
        CategoryPostServiceInterface $categoryPostService
    ) {
        $this->categoryPostService = $categoryPostService;
    }

    public function index(Request $request)
    {
        if ($request->query('page')) {
            $currentPage = $request->query('page', 1);
        }

        if ($request->query('parent_id')) {
            $parentId = $request->query('parent_id', null);
        }

        session([
            'page' => $currentPage ?? null,
            'parent_id' => $parentId ?? null
        ]);

        $data = $this->categoryPostService->filter($request);


        return view('admin.pages.categoryPosts.index', compact('data'));
    }


    public function create()
    {
        $listCategoryPost = $this->categoryPostService->getAll();
        return view('admin.pages.categoryPosts.create', compact('listCategoryPost'));
    }
    public function store(CategoryPostRequest $request)
    {
        try {
            DB::beginTransaction();

            $this->categoryPostService->create($request);

            DB::commit();

            $currentPage = session('page', 1);

            $parentId = session('parent_id', null);

            $redirectUrl = route('admin.categoryPosts.index', [
                'page' => $currentPage,
                'parent_id' => $parentId
            ]);

            return redirect($redirectUrl)->with([
                'status_succeed' => "Thêm mới danh mục thành công"
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
        $cate = $this->categoryPostService->find($id);

        if (!$cate) {
            return redirect()->route('admin.categoryPosts.index')->with([
                'status_failed' => 'Không tìm thấy danh mục'
            ]);
        }

        $getListCategoryPostEdit = $this->categoryPostService->getListCategoryPostEdit($id);

        if ($getListCategoryPostEdit) {
            return view('admin.pages.categoryPosts.edit', compact('cate', 'getListCategoryPostEdit'));
        }
    }

    public function update(CategoryPostRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $this->categoryPostService->update($request, $id);

            DB::commit();

            $currentPage = session('page', 1);

            $parentId = session('parent_id', null);

            $redirectUrl = route('admin.categoryPosts.index', [
                'page' => $currentPage,
                'parent_id' => $parentId
            ]);

            return redirect($redirectUrl)->with([
                'status_succeed' => 'Cập nhật danh mục thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with([
                'status_failed' => 'Đã xảy ra lỗi khi cập nhật'
            ]);
        }
    }
    public function delete($id)
    {
        try {
            DB::beginTransaction();

            $this->categoryPostService->delete($id);

            DB::commit();

            $currentPage = session('page', 1);

            $parentId = session('parent_id', null);

            $redirectUrl = route('admin.categoryPosts.index', [
                'page' => $currentPage,
                'parent_id' => $parentId
            ]);

            return redirect($redirectUrl)->with([
                'status_succeed' => 'Xóa danh mục thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with([
                'status_failed' => 'Đã xảy ra lỗi khi xóa'
            ]);
        }
    }


    public function removeAvatarImage(Request $request)
    {
        $categoryPost = $this->removeImage($request, new CategoryPost, 'avatar', 'categoryPosts');

        return response()->json(['avatar' => $categoryPost]);
    }

    public function changeOrder(Request $request)
    {
        $this->categoryPostService->changeOrder($request);

        return response()->json(['newOrder' => $request->order]);
    }

    public function changePosition(Request $request)
    {
        $result = $this->categoryPostService->changePosition($request);

        if (!$result) {
            return response()->json([
                'status' => false,
                'newPosition' => $request->position,
            ]);
        }

        return response()->json([
            'status' => true,
            'newPosition' => $request->position,
        ]);
    }
    public function deleteItemMultipleChecked(Request $request)
    {
        try {
            DB::beginTransaction();
            if (empty($request->selectedIds)) {
                return response()->json(['message' => 'Vui lòng chọn ít nhất 1 bản ghi'], 400);
            }
            $this->categoryPostService->deleteMultipleChecked($request);

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
