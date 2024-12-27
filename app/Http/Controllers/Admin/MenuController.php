<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menus\StoreMenuRequest;
use App\Services\Admin\CategoryPosts\Interfaces\CategoryPostServiceInterface;
use App\Services\Admin\Menus\Interfaces\MenuServiceInterface;
use App\Services\Admin\Menus\MenuService;
use App\Services\Admin\Pages\Interfaces\PageServiceInterface;
use App\Services\Admin\Posts\Interfaces\PostServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    protected $menuService;
    protected $postService;
    protected $postCategoryService;
    protected $pageService;
    public function __construct(
        MenuServiceInterface $menuService,
        PostServiceInterface $postService,
        CategoryPostServiceInterface $postCategoryService,
        PageServiceInterface $pageService
    )
    {
        $this->menuService = $menuService;
        $this->pageService = $pageService;
        $this->postCategoryService = $postCategoryService;
        $this->postService = $postService;
    }

    public function index()
    {
        $pages = $this->pageService->getAllActive();

        $menus = $this->menuService->getAll();

        $categoryPosts = $this->postCategoryService->getAll();

        $posts = $this->postService->getAllActive();

        $lastChildId = $this->menuService->getLastChildId();

        return view('admin.pages.menus.index', compact(
            'pages',
            'menus',
            'lastChildId',
            'posts',
            'categoryPosts',
        ));
    }

    public function store(StoreMenuRequest $request)
    {
        try {
            if(empty($request->menu)) {
                return response()->json([
                    'status' => false,
                ]);
            }

            $this->menuService->create($request);

            return response()->json([
                'status' => true
            ]);
        } catch(\Exception $e) {
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return response()->json([
                'status' => false,
                'message' => $e
            ]);
        }
    }

    public function delete()
    {
        try {
            DB::beginTransaction();

            $menus = $this->menuService->delete(0);

            DB::commit();

            if ($menus) {
                return redirect()->route('admin.menus.index')->with('status_succeed', 'Xóa menu thành công');
            } else {
                return back()->with('status_failed', 'Không thể xóa vì menu đang trống!');
            }
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return back()->with('status_failed', 'Đã xảy ra lỗi');
        }
    }

}
