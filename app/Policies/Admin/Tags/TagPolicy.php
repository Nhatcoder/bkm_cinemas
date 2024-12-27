<?php

namespace App\Policies\Admin\Tags;

use App\Models\User;
use App\Models\tag;
use Illuminate\Auth\Access\Response;

class TagPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('view-tag');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('view-tag');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('create-tag');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('update-tag');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('delete-tag');
    }

    public function deleteMultiple(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('delete-multiple-tag');
    }

    public function changeOrder(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('change-order-tag');
    }

    public function changeActive(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('change-active-tag');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, tag $tag)
    {
        //
    }
}
