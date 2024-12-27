<?php

namespace App\Repositories\Admin\CategoryPosts\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface CategoryPostInterface extends RepositoryInterface
{
    public function getListCategoryPost();
    public function getListCategoryPostEdit($id);
    public function filter($request);
    public function checkPosition($positionValue);
    public function changeOrder($id, $order);
}
