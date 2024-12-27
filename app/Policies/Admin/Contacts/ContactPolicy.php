<?php

namespace App\Policies\Admin\Contacts;

use App\Models\User;

class ContactPolicy
{
    public function viewAny(User $user)
    {
        if ($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('view-contact');
    }

    public function delete(User $user)
    {
        if ($user->type == User::TYPE_ADMIN) {
            return true;
        }

        return $user->hasPermission('delete-contact');
    }
}
