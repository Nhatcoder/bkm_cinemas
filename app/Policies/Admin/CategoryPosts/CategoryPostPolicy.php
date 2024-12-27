<?php

namespace App\Policies\Admin\CategoryPosts;

use App\Models\CategoryPost;
use App\Models\User;

class CategoryPostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('view-category-post');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('view-category-post');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('create-category-post');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('update-category-post');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('delete-category-post');
    }

    public function deleteMultiple(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('delete-multiple-category-post');
    }

    public function changeOrder(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('change-order-category-post');
    }

    public function changePosition(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('change-position-category-post');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CategoryPost $categoryPost)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CategoryPost $categoryPost)
    {
        //
    }
}
