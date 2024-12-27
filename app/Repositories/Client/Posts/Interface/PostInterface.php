<?php

namespace App\Repositories\Client\Posts\Interface;

interface PostInterface
{
    public function getPostFirst($slug);
    public function getPostFirstByCateSlug($slugCate, $slug);
    public function getPostRelated($slugCate, $slug);
    public function getPostByCategory($slug);
}
