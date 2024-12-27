<?php

namespace App\Policies\Admin\Actors;

use App\Models\Actor;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ActorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('view-actor');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('view-actor');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('create-actor');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('update-actor');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('delete-actor');
    }

    public function deleteMultiple(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('delete-multiple-actor');
    }
}
