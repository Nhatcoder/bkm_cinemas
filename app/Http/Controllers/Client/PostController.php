<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Client\Systems\Interfaces\SystemInterface;
use App\Services\Client\CategoryPosts\Interface\CategoryPostServiceInterface;
use App\Services\Client\Movies\Interfaces\MovieServiceInterface;
use App\Services\Client\Posts\Interface\PostServiceInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $categoryPostService;
    private $movieService;
    private $postService;
    private $systemService;

    public function __construct(
        CategoryPostServiceInterface $categoryPostService,
        MovieServiceInterface $movieService,
        PostServiceInterface $postService,
        SystemInterface $systemService,
    ){
        $this->categoryPostService = $categoryPostService;
        $this->movieService = $movieService;
        $this->postService = $postService;
        $this->systemService = $systemService;
    }
    public function list($slug) {
        $categoryPost = $this->categoryPostService->getCategoryPostBySlug($slug);
        $system = $this->systemService->getSytemBySlug($slug);
        if(!empty($categoryPost)) {
            $posts = $categoryPost
                    ->posts()
                    ->where('active', 1)
                    ->orderBy('id', 'desc')
                    ->paginate(PAGINATE_POST);

            $movieIsShowing = $this->movieService->movieIsShowing();

            $data = [
                'categoryPost' => $categoryPost,
                'posts' => $posts,
                'movieIsShowing' => $movieIsShowing,
            ];
            return view('client.pages.post-by-category', $data);
        }elseif(!empty($system)){
            return view('client.pages.system', compact('system'));
        }else{
            return view('error.client.404');
        }
    }

    public function detail($cateSlug, $slug) {
        $post = $this->postService->getPostFirstByCateSlug($cateSlug, $slug);
        if(is_null($post)){
            return view('error.client.404');
        }
        $postRelated = $this->postService->getPostRelated($cateSlug, $slug);
        $data = [
            'post' => $post,
            'postRelated' => $postRelated,
            'cateSlug' => $cateSlug,
        ];
        return view('client.pages.post-detail', $data);
    }
}
