<?php

namespace App\Policies\Admin\Rewards;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class RewardPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('view-reward');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('view-reward');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('create-reward');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('update-reward');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('delete-reward');
    }

    public function deleteMultiple(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('delete-multiple-reward');
    }

    public function changeActive(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('change-active-reward');
    }
}
