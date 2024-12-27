<?php

namespace App\Repositories\Admin\BlockTypes\Repositories;

use App\Models\BlockType;
use App\Repositories\Admin\BlockTypes\Interfaces\BlockTypeInterface;
use App\Repositories\Base\BaseRepository;

class BlockTypeRepository extends BaseRepository implements BlockTypeInterface
{
    public function getModel()
    {
        return BlockType::class;
    }

    public function countBlockType()
    {
        return $this->model->count();
    }

    public function filter($request)
    {
        $blockTypes = $this->model->orderBy('order');

        if($request->name) {
            $blockTypes = $blockTypes->where('name', 'like', '%' . $request->name . '%');
        }

        $blockTypes = $blockTypes->paginate(self::PAGINATION);

        return $blockTypes;
    }

    public function getAllActive()
    {
        return $this->model->where('active', 1)->get();
    }

}
