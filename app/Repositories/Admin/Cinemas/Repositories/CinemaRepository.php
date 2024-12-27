<?php

namespace App\Repositories\Admin\Cinemas\Repositories;
use App\Repositories\Admin\Cinemas\Interfaces\CinemaInterface;
use App\Repositories\Base\BaseRepository;

class CinemaRepository extends BaseRepository implements CinemaInterface
{
    public function getModel()
    {
        return \App\Models\Cinema::class;
    }

    public function filter($request)
    {
        $data = $this->model->newQuery();
        $data = $this->filterByName($data, $request);
        $data = $this->filterByAreaOrCity($data, $request);
        $data = $this->applyOrdering($data, $request);
        $data = $data->with('area')->paginate(self::PAGINATION);

        return $data->appends([
            'name' => $request->name,
            'order_with' => $request->order_with,
            'area_id' => $request->area_id,
        ]);
    }

    public function getAllActive(){
        return $this->model->select('id', 'name', 'area_id')->where('active', 1)->get();
    }

    public function getCinemaByArea($area_id){
        return $this->model->select('id', 'name')
            ->where('active', 1)
            ->where('area_id', $area_id)
            ->get();
    }

    public function deleteMultiple(array $ids)
    {
        collect($ids)->chunk(1000)->each(function ($chunk) {
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

    private function filterByAreaOrCity($query, $request)
    {
        if (!empty($request->area_id)) {
            return $query->where('area_id', $request->area_id);
        }elseif (!empty($request->city_id)) {
            return $query->whereHas('area', function ($query) use ($request) {
                $query->where('city_id', $request->city_id);
            });
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
                case 'birthDateASC':
                    return $query->orderBy('birth_date', 'asc');
                case 'birthDateDESC':
                    return $query->orderBy('birth_date', 'desc');
            }
        }
        return $query;
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
