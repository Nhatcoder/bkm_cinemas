<?php

namespace App\Services\Admin\CategoryPosts\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface CategoryPostServiceInterface extends BaseServiceInterface
{
    public function getListCategoryPostEdit($id);
    public function filter($request);
    public function changeOrder($request);
    public function changeActive($request);
    public function changePosition($request);
    public function deleteMultipleChecked($request);


}
