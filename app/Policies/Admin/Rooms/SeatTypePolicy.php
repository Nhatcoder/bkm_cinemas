<?php

namespace App\Policies\Admin\Rooms;

use App\Models\User;

class SeatTypePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        return $user->hasPermission('view-seat-type');
    }
    
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-seat-type');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-seat-type');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        return $user->hasPermission('update-seat-type');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        return $user->hasPermission('delete-seat-type');
    }
   
}
