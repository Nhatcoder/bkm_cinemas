<?php

namespace App\Policies\Admin\Modules;

use App\Models\Module;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ModulePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('view-module');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('view-module');
    }

    public function viewPermission(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('view-permission-module');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('create-module');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('update-module');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('delete-module');
    }

    public function deleteMultiple(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        
        return $user->hasPermission('delete-multiple-module');
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
