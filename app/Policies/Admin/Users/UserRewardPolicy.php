<?php

namespace App\Policies\Admin\Users;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserRewardPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('view-user-reward');
    }

    public function changeStatus(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('change-status-user-reward');
    }

}
