<?php

namespace App\Services\Admin\Foods\Services;
use App\Repositories\Admin\Foods\Interfaces\FoodTypeInterface;
use App\Services\Admin\Foods\Interfaces\FoodTypeServiceInterFace;
use App\Services\Base\BaseService;

class FoodTypeService extends BaseService implements FoodTypeServiceInterFace
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getRepository()
    {
        return FoodTypeInterface::class;
    }
    public function filter($request){
        return $this->repository->filter($request);
    }
    public function deleteMultipleChecked($request)
    {
        if (count($request->selectedIds) < 0) {
            return false;
        }
        $this->repository->deleteMultiple($request->selectedIds);
        return true;
    }

    public function getAllActive()
    {
        return $this->repository->getAllActive();
    }

    public function changeActive($request)
    {
        return $this->repository->changeActive($request->id);
    }

    public function changeOrder($request)
    {
        return $this->repository->changeOrder($request->id, $request->order);
    }

}
