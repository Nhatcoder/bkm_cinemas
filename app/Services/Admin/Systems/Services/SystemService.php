<?php

namespace App\Services\Admin\Systems\Services;

use App\Repositories\Admin\Systems\Interfaces\SystemInterface;
use App\Services\Admin\Systems\Interfaces\SystemServiceInterface;
use App\Services\Base\BaseService;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Storage;

class SystemService extends BaseService implements SystemServiceInterface
{
    use StorageImageTrait;

    public function getRepository()
    {
        return SystemInterface::class;
    }

    public function getAllSystemByType0($request)
    {
        return $this->repository->getAllSystemByType0($request);
    }

    public function getAllSystemBySystemId($request)
    {
        return $this->repository->getAllSystemBySystemId($request);
    }

    public function create(&$request)
    {
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'content' => $request->content,
            'order' => $request->order ?? 0,
            'active' => $request->active,
            'type' => $request->type,
        ];

        $imageUploadData = $this->storageTraitUpload($request, 'image', 'public/systems');

        if ($imageUploadData) {
            $data['image'] = $imageUploadData['path'];
        }

        $system = $this->repository->create($data);

        return $system;
    }

    public function update(&$request, $id)
    {
        $system = $this->repository->find($id);

        if (!$system) {
            return redirect()->route('admin.systems.index')->with('status_failed', 'Không tìm thấy nội dung');
        }

        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'content' => $request->content,
            'order' => $request->order ?? 0,
            'active' => $request->active,
            'type' => $request->type,
        ];

        if ($request->hasFile('image')) {
            if ($system->image) {
                $path = 'public/systems/' . basename($system->image);
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
            }

            $imageUploadData = $this->storageTraitUpload($request, 'image', 'public/systems');
            $data['image'] = $imageUploadData['path'];
        }
        $system = $this->repository->update($id, $data);

        return $system;
    }

    public function changeActive($request)
    {
        return $this->repository->changeActive($request->id);
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
