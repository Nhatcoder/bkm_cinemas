<?php

namespace App\Repositories\Client\Views\Repositories;

use App\Models\Notification;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Client\Views\Interfaces\ViewInterface;
use Illuminate\Support\Facades\Auth;

class ViewRepository implements ViewInterface
{
    protected $notifications;
    public function __construct(Notification $notification)
    {
        $this->notifications = $notification;
    }

    public function getNotifications()
    {
        $data['users'] = collect([]);
        $data['all'] = collect([]);
        if (!empty(Auth::user()->id)) {
            $data['users'] = $this->notifications->where('user_id', Auth::user()->id)
                ->where('type', 'promotion')->get();
        }
        $data['all'] = $this->notifications->where('type', 'all')->get();
        return $data;
    }
}
