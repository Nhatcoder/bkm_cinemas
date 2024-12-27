<?php

namespace App\Repositories\Admin\Notifications\Repositories;

use App\Constants\MemberLevel;
use App\Models\Booking;
use App\Models\Notification;
use App\Repositories\Admin\Notifications\Interfaces\NotificationInterface;
use App\Repositories\Base\BaseRepository;

class NotificationRepository extends BaseRepository implements NotificationInterface
{
    public function getModel()
    {
        return Notification::class;
    }

    public function getByType($type)
    {
        return $this->model->where('type', $type)->orderBy('id', 'desc')->get();
    }

    public function getByCinemaId($cinema_id)
    {
        return $this->model->where('cinema_id', $cinema_id)->where('type', 'refund')->orderBy('id', 'desc')->get();
    }

    public function filter($request)
    {
        $data = $this->model->newQuery();
        $data = $data->where('type', '!=', 'refund');
        $data = $this->filterByName($data);
        $data = $data->paginate(self::PAGINATION);
        return $data->appends([
            'title' => $request->title,
        ]);
    }



    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();
            return true;
        }

        return false;
    }

    public function deleteMultiple(array $ids)
    {
        collect($ids)->chunk(1000)->each(function ($chunk) {
            $this->model->whereIn('id', $chunk)->delete();
        });
        return true;
    }

    protected function filterByName($query)
    {
        if (!empty(request()->title)) {
            return $query->where('title', 'like', '%' . request()->title . '%');
        }
        return $query;
    }


}
