<?php

namespace App\Repositories\Admin\Areas\Repositories;

use App\Models\Area;
use App\Repositories\Admin\Areas\Interfaces\AreaInterface;
use App\Repositories\Base\BaseRepository;

class AreaRepository extends BaseRepository implements AreaInterface
{
    public function getModel()
    {
        return Area::class;
    }

    public function getByCityId($cityId)
    {
        return $this->model->where('city_id', $cityId)->get();
    }

    public function filter($request)
    {
        $query = $this->model->newQuery();

        $query = $this->filterByName($query, $request);

        $query = $this->filterByCity($query, $request);

        $data = $query->paginate(self::PAGINATION);

        return $data->appends([
            'name' => $request->area_name,
            'city_id' => $request->cityId
        ]);
    }

    private function filterByName($query, $request)
    {
        if (!empty($request->area_name)) {
            $query->where('name', 'like', '%' . $request->area_name . '%');
        }
        return $query;
    }

    private function filterByCity($query, $request)
    {
        if (!empty($request->cityId)) {
            $query->where('city_id', $request->cityId);
        }
        return $query;
    }

}
