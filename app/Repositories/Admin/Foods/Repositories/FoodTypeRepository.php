<?php

namespace App\Repositories\Admin\Foods\Repositories;

use App\Repositories\Admin\Foods\Interfaces\FoodTypeInterface;
use App\Repositories\Base\BaseRepository;

class FoodTypeRepository extends BaseRepository implements FoodTypeInterface
{
    public function getModel()
    {
        return \App\Models\FoodType::class;
    }

    public function filter($request)
    {
        $data = $this->model->newQuery();

        $data = $this->filterByName($data, $request);

        $data = $this->filterByStatus($data, $request);

        $data = $this->applyOrdering($data, $request);

        $data = $data->paginate(self::PAGINATION);

        return $data->appends([
            'name' => $request->name,
            'order_with' => $request->order_with,
            'fill_action' => $request->fill_action,
        ]);
    }

    public function deleteMultiple(array $ids)
    {
        collect($ids)->chunk(1000)->each(function ($chunk) {
            $this->model->whereIn('id', $chunk)->delete();
        });
        return true;
    }

    protected function filterByName($query, $request)
    {
        if (!empty($request->name)) {
            return $query->where('name', 'like', '%' . $request->name . '%');
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

    protected function applyOrdering($query, $request)
    {
        if (!empty($request->order_with)) {
            switch ($request->order_with) {
                case 'dateASC':
                    return $query->orderBy('created_at', 'asc');
                case 'dateDESC':
                    return $query->orderBy('created_at', 'desc');
                case 'priceASC':
                    return $query->orderBy('price', 'asc');
                case 'priceDESC':
                    return $query->orderBy('price', 'desc');
            }
        }
        return $query->orderBy('order');
    }
    public function getAllActive()
    {
        return $this->model->select('id', 'name', 'order')->where('active', 1)->get();
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

    public function changeOrder($id, $order)
    {
        $result = $this->find($id);
        if ($result) {
            $result->order = $order;
            $result->save();
            return $result;
        }
        return false;
    }
}
