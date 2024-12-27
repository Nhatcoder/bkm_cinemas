<?php

namespace App\Repositories\Admin\Foods\Repositories;

use App\Repositories\Admin\Foods\Interfaces\FoodInterface;
use App\Repositories\Base\BaseRepository;

class FoodRepository extends BaseRepository implements FoodInterface
{
    public function getModel()
    {
        return \App\Models\Food::class;
    }

    public function filter($request)
    {
        $data = $this->model->newQuery();

        $data = $this->filterByName($data, $request);

        $data = $this->filterByStatus($data, $request);

        $data = $this->applyOrdering($data, $request);

        $data = $this->filterByFoodTypeId($data, $request);

        $data = $data->with(['type' => function ($query) {
            $query->select('id', 'name')->where('active', 1);
        }])->paginate(self::PAGINATION);

        return $data->appends([
            'name'        => $request->name,
            'order_with'  => $request->order_with,
            'nationality' => $request->nationality,
            'foodTypeId'  => $request->foodTypeId
        ]);
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->items()->forceDelete();
            $result->delete();
            return true;
        }

        return false;
    }

    public function deleteMultiple(array $ids)
    {
        collect($ids)->chunk(1000)->each(function ($chunk) {
            \App\Models\FoodComboItem::whereIn('food_id', $chunk)->forceDelete();
            $this->model->whereIn('id', $chunk)->delete();
        });
        return true;
    }

    private function filterByName($query, $request)
    {
        if (!empty($request->name)) {
            return $query->where('name', 'like', '%' . $request->name . '%');
        }
        return $query;
    }

    private function filterByStatus($query, $request)
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

    private function applyOrdering($query, $request)
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

    private function filterByFoodTypeId($query, $request)
    {
        if (!empty($request->foodTypeId)) {
            $foodTypeId = $request->foodTypeId;
            return $query->whereHas('type', function ($q) use ($foodTypeId) {
                $q->where('food_type_id', $foodTypeId);
            });
        }
        return $query->orderBy('order');

    }

    public function getAllActive()
    {
        return $this->model->select('id', 'name', 'image')->where('active', 1)->get();
    }

    public function getByMultipleId(array $ids)
    {
        return $this->model
            ->select('id', 'name', 'image')
            ->whereIn('id', $ids)
            ->where('active', 1)
            ->get();
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
