<?php

namespace App\Services\Admin\Tags\Services;

use App\Repositories\Admin\Tags\Interfaces\TagInterface;
use App\Repositories\Admin\Tags\Repositories\TagRepository;
use App\Services\Admin\Tags\Interfaces\TagServiceInterface;
use App\Services\Base\BaseService;
use App\Traits\StorageImageTrait;

class TagService extends BaseService implements TagServiceInterface
{
    use StorageImageTrait;

    public function __construct()
    {
        parent::__construct();
    }
    public function getRepository()
    {
        return TagInterface::class;
    }
    public function create(&$request)
    {
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'order' => $request->order,
            'active' => $request->active,
        ];
        $this->repository->create($data);
        return true;
    }

    public function update(&$request, $id)
    {
        $tag = $this->find($id);

        if (!$tag) {
            return redirect()->route('admin.tags.index')->with([
                'status_failed' => "Không tìm thấy thẻ"
            ]);
        }

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'order' => $request->order,
            'active' => $request->active,
        ];

        return  $this->repository->update($id, $data);
    }

    public function changeActive($request)
    {
        return $this->repository->changeActive($request->id);
    }
    public function changePosition($request)
    {
        $result = $this->repository->checkPosition($request->position);

        if ($result) {
            return false;
        }

        $item = $this->repository->find($request->id);

        $item->update([
            'position' => $request->position
        ]);

        return $item;
    }
    public function changeOrder($request)
    {
        return $this->repository->changeOrder($request->id, $request->order);
    }
    public function deleteMultipleChecked($request)
    {
        if (count($request->selectedIds) > 0) {
            foreach ($request->selectedIds as $id) {
                $this->repository->delete($id);
            }
            return true;
        }
    }

}
