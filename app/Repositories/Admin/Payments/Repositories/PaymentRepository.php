<?php

namespace App\Repositories\Admin\Payments\Repositories;

use App\Models\Payment;
use App\Repositories\Admin\Payments\Interfaces\PaymentInterface;
use App\Repositories\Base\BaseRepository;

class PaymentRepository extends BaseRepository implements PaymentInterface
{
    public function getModel()
    {
        return Payment::class;
    }

    public function filter($request)
    {
        $data = $this->model->newQuery();

        $data = $this->filterByName($data, $request);

        $data = $this->filterByStatus($data, $request);

        $data = $data->paginate(self::PAGINATION);

        return $data->appends([
            'name' => $request->payment_name,
            'fill_action' => $request->fill_action,
        ]);
    }

    protected function filterByName($query, $request)
    {
        if (!empty($request->payment_name)) {
            return $query->where('name', 'like', '%' . $request->payment_name . '%');
        }
        return $query;
    }

    protected function filterByStatus($query, $request)
    {
        if (!empty($request->fill_action)) {
            switch ($request->fill_action) {
                case 'active':
                    return $query->where('active', 1);
                case 'noActive':
                    return $query->where('active', 0);
            }
        }
        return $query;
    }

    public function getAllActive()
    {
        return $this->model->select('id', 'name')->where('active', 1)->get();
    }

    public function changeActive($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->active ^= 1;
            $result->save();
            return $result;
        }
        return false;
    }
}



