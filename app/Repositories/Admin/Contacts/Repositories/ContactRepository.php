<?php

namespace App\Repositories\Admin\Contacts\Repositories;

use App\Models\Contact;
use App\Repositories\Admin\Contacts\Interfaces\ContactInterface;
use App\Repositories\Base\BaseRepository;

class ContactRepository extends BaseRepository implements ContactInterface
{
    public function getModel()
    {
        return Contact::class;
    }

    public function filter($request)
    {
        $data = $this->model->newQuery();

        $data = $this->filterByName($data, $request);

        $data = $this->filterByPhone($data, $request);

        $data = $this->applyOrdering($data, $request);

        $data = $data->paginate(self::PAGINATION);

        return $data->appends([
            'name'        => $request->name,
            'order_with'  => $request->order_with,
        ]);
    }

    private function filterByName($query, $request)
    {
        if (!empty($request->name)) {
            return $query->where('full_name', 'like', '%' . $request->name . '%')->orwhere('email', 'like', '%' . $request->name . '%');
        }
        return $query;
    }

    private function filterByPhone($query, $request)
    {
        if (!empty($request->phone_number)) {
            return $query->where('phone_number', 'like', '%' . $request->phone_number . '%');
        }
        return $query;
    }

    private function applyOrdering($query, $request)
    {
        if (!empty($request->order_with)) {
            switch ($request->order_with) {
                case 'dateASC':
                    return $query->orderBy('created_at', 'asc');
                case 'dateDESC':
                    return $query->orderBy('created_at', 'desc');
            }
        }
        return $query->orderBy('id', 'desc');
    }

}
