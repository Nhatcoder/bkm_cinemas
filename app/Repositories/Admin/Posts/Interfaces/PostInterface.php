<?php

namespace App\Repositories\Admin\Posts\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface PostInterface extends RepositoryInterface
{
    public function getAll();
    public function filter($request);
    public function getAllActive();
    public function checkExitsTags($tagName);
    public function deleteRecordPostTagByPost($postId, $tagsToRemove);
    public function attachTagIfNotExists($record, $tagId);
    public function updateAllRecordPostTagByPost($tagId);
    public function getAllRecordBySoftDeleted($postId, $tagIds);
    public function categoryOfPost($id);
    public function deleteCategoryPostByPost($record, $existingCategoryId);
    public function checkExitsCategoryPost($record, $categoryId);
    public function createCategoryPost($record, $data);
    public function createRelatedPhotoPost($record, $data);
    public function getImageRelatedPhotoById($id);
    public function delete($id);
    public function sendPromotion($id);
}
