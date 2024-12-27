<?php

namespace App\Repositories\Admin\Foods\Repositories;

use App\Repositories\Admin\Foods\Interfaces\FoodComboInterface;
use App\Repositories\Base\BaseRepository;

class FoodComboRepository extends BaseRepository implements FoodComboInterface
{
    public function getModel()
    {
        return \App\Models\FoodCombo::class;
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


    public function create($attributes = [])
    {
        $record = $this->model->create($attributes['food_combo']);
        $record->items()->createMany($attributes['item']);
        return $record;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->items()->delete();
            $result->delete();
            return true;
        }
        return false;
    }

    public function deleteMultiple(array $ids)
    {
        collect($ids)->chunk(1000)->each(function ($chunk) {
            \App\Models\FoodComboItem::whereIn('food_combo_id', $chunk)->delete();
            $this->model->whereIn('id', $chunk)->delete();
        });
        return true;
    }

    public function deleteMultipleItem($record, array $ids)
    {
        $record->items()->whereIn('id', $ids)->forceDelete();
        return true;
    }



    public function createManyItem($record, $attributes = [])
    {
        $record->items()->createMany($attributes);
        return true;
    }

    public function updateItem($record, $attributes = [])
    {
        foreach ($attributes as $itemData) {
            $item = $record->items()->find($itemData['id']);
            $item->update($itemData);
        }
        return true;
    }

    public function find($id)
    {
        $result = $this->model->with(['items' => function ($query) {
            $query->with(['food' => function ($query) {
                $query->select('id', 'name', 'image');
            }])->select('id', 'food_id', 'food_combo_id', 'quantity')->orderBy('id');
        }])->find($id);

        if ($result) {
            return $result;
        }

        return false;
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
