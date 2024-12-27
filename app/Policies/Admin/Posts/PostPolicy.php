<?php

namespace App\Policies\Admin\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('view-post');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('view-post');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('create-post');
    }

    public function copy(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('copy-post');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('update-post');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('delete-post');
    }

    public function deleteMultiple(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('delete-multiple-post');
    }

    public function changeOrder(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('change-order-post');
    }

    public function changeActive(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('change-active-post');
    }

    public function changeHot(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('change-hot-post');
    }

    public function changeStatus(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('change-status-post');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function sendPromotion(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('send-promotion-post');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
