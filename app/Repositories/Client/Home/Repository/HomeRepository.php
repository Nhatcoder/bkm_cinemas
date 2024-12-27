<?php

namespace App\Repositories\Client\Home\Repository;

use App\Events\Client\EmailSubscribeEvent;
use App\Models\Post;
use App\Models\Movie;
use App\Models\MovieGenre;
use App\Models\CategoryPost;
use App\Models\Notification;
use App\Models\PostCategory;
use App\Models\User;
use App\Repositories\Client\Home\Interface\HomeRepositoryInterface;

class HomeRepository implements HomeRepositoryInterface
{

    protected $movie;
    protected $movieGenre;
    protected $post;
    protected $categoryPost;
    protected $postCategory;
    protected $notification;


    public function __construct(
        Movie $movie,
         MovieGenre $movieGenre,
          Post $post,
           CategoryPost $categoryPost,
            PostCategory $postCategory,
            Notification $notification
            )
    {
        $this->movie = $movie;
        $this->post = $post;
        $this->categoryPost = $categoryPost;
        $this->postCategory = $postCategory;
        $this->movieGenre = $movieGenre;
        $this->notification = $notification;
    }

    public function sliders()
    {
        return $this->movie->select('slug', 'title', 'banner_movie')
            ->where([['hot', 1], ['active', 1], ['deleted_at', null]])
            ->orderBy('order', 'asc')
            ->paginate(LIMIT_SLIDER);
    }

    public function movieIsShowing()
    {
        return $this->movie->select('id', 'title', 'slug', 'image', 'duration', 'trailer_url', 'format', 'release_date', 'premiere_date')
            ->where('premiere_date', '<=', date('Y-m-d'))
            ->where('active', 1)
            ->orderBy('order', 'asc')
            ->get();
    }

    public function upcomingMovie()
    {
        return $this->movie->select('id', 'title', 'slug', 'image', 'duration', 'trailer_url', 'format', 'release_date', 'premiere_date')
            ->where('premiere_date', '>', date('Y-m-d'))
            ->where('active', 1)
            ->orderBy('order', 'asc')
            ->get();
    }

    public function promotionEvent()
    {
        $category = $this->categoryPost->where('id', 1)->where('deleted_at', null)->first();
        if ($category) {
            $ids = $this->postCategory->where('category_id', $category->id)->where('deleted_at', null)->pluck('post_id')->toArray();
            $posts = $this->post->select('name', 'slug', 'avatar', 'description')->whereIn('id', $ids)->get();
            return [
                'category' => $category,
                'posts' => $posts
            ];
        }
    }

    public function emailSubscribe($request)
    {
        $checkEmailExists = User::where('email', $request->email)->where('type', 'member')->where('status', 1)->first();

        if (!$checkEmailExists) {
            return response()->json([
                'status' => 'faile',
                'message' => 'Email không tồn tại trong hệ thống, vui lòng đăng kí để tiếp tục',
            ],404);
        }

        if ($checkEmailExists->is_subscribed_promotions == 1) {
            return response()->json([
                'status' => 'faile',
                'message' => 'Email đã nhận tin trước đó',
            ],400);
        }

        if ($checkEmailExists->is_subscribed_promotions == 0) {
            $checkEmailExists->is_subscribed_promotions = 1;
            EmailSubscribeEvent::dispatch($request->email);
            $checkEmailExists->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Đăng ký nhận tin thành công',
            ],200);
        }
    }

    public function deleteNotification($id){
        $this->notification->find($id)->delete();
        return response()->json(['message' => 'Xóa thành công'],204);
    }
}
