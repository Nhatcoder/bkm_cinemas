<?php

namespace App\Repositories\Client\Cities\Repositories;

use App\Models\City;
use App\Repositories\Base\BaseRepository;
use App\Repositories\Client\Cities\Interfaces\CityInterface;

class CityRepository extends BaseRepository implements CityInterface
{
    public function getModel()
    {
        return City::class;
    }
}
