<?php


namespace App\Repositories\Client\Home\Interface;

interface HomeRepositoryInterface
{
    public function sliders();
    public function movieIsShowing();
    public function upcomingMovie();
    public function promotionEvent();
    public function emailSubscribe($request);
    public function deleteNotification($id);
}
