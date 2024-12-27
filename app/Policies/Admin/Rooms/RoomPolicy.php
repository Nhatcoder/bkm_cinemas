<?php

namespace App\Policies\Admin\Rooms;

use App\Models\User;

class RoomPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermission('view-room');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-room');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-room');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        return $user->hasPermission('update-room');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        return $user->hasPermission('delete-room');
    }
}
