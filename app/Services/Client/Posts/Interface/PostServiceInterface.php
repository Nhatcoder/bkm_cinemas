<?php

namespace App\Services\Client\Posts\Interface;

interface PostServiceInterface {
    public function getPostFirst($slug);
    public function getPostFirstByCateSlug($slugCate, $slug);
    public function getPostRelated($slugCate, $slug);
    public function getPostByCategory($slug);
}
