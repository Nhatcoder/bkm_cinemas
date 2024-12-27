<?php

namespace App\Http\Controllers\Client;

use App\Services\Client\CategoryPosts\Interface\CategoryPostServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailSubscribe\EmailSubscribeRequest;
use App\Services\Client\Home\Interfaces\HomeServiceInterface;
use App\Services\Client\Posts\Interface\PostServiceInterface;
use App\Services\Client\Views\Interfaces\ViewServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    protected $homeService;
    protected $postService;
    protected $categoryPostService;

    public function __construct(
        HomeServiceInterface $homeService,
        PostServiceInterface $postService,
        CategoryPostServiceInterface $categoryPostService
    ) {
        $this->homeService = $homeService;
        $this->postService = $postService;
        $this->categoryPostService = $categoryPostService;
    }

    public function index()
    {
        $sliders = $this->homeService->sliders();
        $movieIsShowing = $this->homeService->movieIsShowing();
        $upComingMovie = $this->homeService->upcomingMovie();
        $postPromotion = $this->postService->getPostByCategory('khuyen-mai');
        $postReviews = $this->postService->getPostByCategory('danh-gia-phim')->chunk(2);
        $postRewards = $this->categoryPostService->getCategoryPostBySlug('qua-tang');

        return view('client.pages.home', [
            'sliders' => $sliders,
            'movieIsShowing' => $movieIsShowing,
            'upComingMovie' => $upComingMovie,
            'postPromotion' => $postPromotion,
            'postReviews' => $postReviews,
            'postRewards' => $postRewards
        ]);
    }
    public function emailSubscribe(EmailSubscribeRequest $request)
    {
        try {
            DB::beginTransaction();

            $result = $this->homeService->emailSubscribe($request);

            DB::commit();
            return response()->json(['result' => $result], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' ---Line: ' . $e->getLine());

            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra!',
            ], 500);
        }
    }

    public function deleteNotification(Request $request)
    {
        try {
            DB::beginTransaction();
            if(empty($request->id)){
                return response()->json([
                    'status' => 'faile',
                    'message' => 'Lỗi không tìm thấy thông báo']);
            }
            $result = $this->homeService->deleteNotification($request->id);
            DB::commit();
            return response()->json(['result' => $result], 200);
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
