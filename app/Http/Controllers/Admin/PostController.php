<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\PostRequest;
use App\Models\Post;
use App\Services\Admin\CategoryPosts\Interfaces\CategoryPostServiceInterface;
use App\Services\Admin\Posts\Interfaces\PostServiceInterface;
use App\Services\Admin\Tags\Interfaces\TagServiceInterface;
use App\Traits\RemoveImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    use RemoveImageTrait;

    protected $postService;
    protected $tagService;
    protected $categoryPostService;


    public function __construct(
        CategoryPostServiceInterface     $categoryPostService,
        TagServiceInterface $tagService,
        PostServiceInterface             $postService,
    ) {
        $this->postService = $postService;
        $this->tagService = $tagService;
        $this->categoryPostService = $categoryPostService;
    }

    public function index(Request $request)
    {
        $listCategoryPost = $this->categoryPostService->getAll();

        $results = $this->postService->filter($request);

        return view('admin.pages.posts.index', [
            'data' => $results['data'],
            'listCategoryPost' => $listCategoryPost,
            'hot' => $results['hot'],
            'active' => $results['active'],
            'name' => $results['name'],
            'typeOrder' => $results['typeOrder'],
            'selectedCategories' => $results['categories']
        ]);
    }

    public function create()
    {
        $listCategoryPost = $this->categoryPostService->getAll();
        $tags = $this->tagService->getAll();

        return view('admin.pages.posts.create', compact('listCategoryPost', 'tags'));
    }

    public function store(PostRequest $request)
    {
        try {
            DB::beginTransaction();

            $this->postService->create($request);

            DB::commit();

            $redirectUrl = route('admin.posts.index');

            return redirect($redirectUrl)->with([
                'status_succeed' => "Thêm bài viết thành công"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi thêm');
        }
    }

    public function edit($id)
    {
        $post = $this->postService->find($id);

        if (!$post) {
            return redirect()->route('admin.posts.index')->with([
                'status_failed' => "Không tìm thấy bài viết"
            ]);
        }

        $listCategoryPost = $this->categoryPostService->getAll();

        $tags = $this->tagService->getAll();

        $cateData = $this->postService->categoryOfPost($id);

        $tagsSelected = $this->postService->tagsSelected($id)->toArray();

        return view('admin.pages.posts.edit', compact(
            'post',
            'cateData',
            'listCategoryPost',
            'tags',
            'tagsSelected',
        ));
    }

    public function update(PostRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $this->postService->update($request, $id);

            DB::commit();

            $redirectUrl = route('admin.posts.index');

            return redirect($redirectUrl)->with([
                'status_succeed' => "Cập nhật bài viết thành công"
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

            $this->postService->delete($id);

            DB::commit();

            $redirectUrl = route('admin.posts.index');

            return redirect($redirectUrl)->with([
                'status_succeed' => 'Xóa bài viết thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi khi xóa');
        }
    }

    public function removeAvatarImage(Request $request)
    {
        $post = $this->removeImage($request, new Post, 'avatar', 'posts');

        return response()->json(['avatar' => $post]);
    }

    public function changeOrder(Request $request)
    {
        $this->postService->changeOrder($request);

        return response()->json(['newOrder' => $request->order]);
    }

    public function changeHot(Request $request)
    {
        $item = $this->postService->changeHot($request);

        return response()->json(['newHot' => $item->hot]);
    }

    public function changeActive(Request $request)
    {
        $item = $this->postService->changeActive($request);

        return response()->json(['newStatus' => $item->active]);
    }

    public function destroyImage($id)
    {
        try {
            DB::beginTransaction();

            $this->postService->destroyImage($id);

            DB::commit();

            return response()->json([
                'delete' => true,
                'message' => 'Xóa ảnh thành công'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error("File: " . $e->getFile() . '---Line: ' . $e->getLine() . "---Message: " . $e->getMessage());

            return response()->json([
                'code' => 500,
                'message' => trans('message.server_error')
            ], 500);
        }
    }
    public function deleteItemMultipleChecked(Request $request)
    {
        try {
            DB::beginTransaction();
            if (empty($request->selectedIds)) {
                return response()->json(['message' => 'Vui lòng chọn ít nhất 1 bản ghi'], 400);
            }
            $this->postService->deleteMultipleChecked($request);

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

    public function sendPromotion(Request $request) {
        try {
            DB::beginTransaction();
            if (empty($request->id)) {
                return response()->json(['message' => 'Bài viết không tồn tại'], 400);
            }
         $this->postService->sendPromotion($request->id);
          

            DB::commit();
            return response()->json(['message' => 'Gửi thông tin sự kiện thành công!'], 200);
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
