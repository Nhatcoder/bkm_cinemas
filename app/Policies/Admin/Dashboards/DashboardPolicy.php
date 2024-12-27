<?php

namespace App\Policies\Admin\Dashboards;

use App\Models\User;

class DashboardPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        if($user->type == User::TYPE_ADMIN) {
            return true;
        }
        // Kiểm tra quyền của người dùng
        return $user->hasPermission('view-dashboard');
    }
}
