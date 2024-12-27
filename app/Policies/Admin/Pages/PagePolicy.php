<?php

namespace App\Policies\Admin\Pages;

use App\Models\Page;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PagePolicy
{
    public function viewAny(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('view-page');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('view-page');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('create-page');
    }

    public function copy(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('copy-page');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('update-page');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('delete-page');
    }

    public function deleteMultiple(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('delete-multiple-page');
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
    public function forceDelete(User $user)
    {
        //
    }
}
