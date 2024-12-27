<?php

namespace App\Services\Admin\Foods\Services;
use App\Repositories\Admin\Foods\Interfaces\FoodInterface;
use App\Services\Admin\Foods\Interfaces\FoodServiceInterface;
use App\Services\Base\BaseService;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Storage;

class FoodService extends BaseService implements FoodServiceInterface
{
    use StorageImageTrait;

    public function __construct()
    {
        parent::__construct();
    }
    public function getRepository()
    {
        return FoodInterface::class;
    }
    public function filter($request){
        return $this->repository->filter($request);
    }
    public function create(&$data)
    {
        if (isset($data['image']) && $data['image']) {
            $uploadData = $this->uploadFile($data['image'], 'public/foods');
            $data['image'] = $uploadData['path'];
        }
        $data['price'] = $this->sanitizePrice($data['price']);
        return $this->repository->create($data);
    }

    public function update(&$data, $id)
    {
        $record = $this->find($id);
        if (!$record) {
            return false;
        }

        if (isset($data['image']) && $data['image']) {
            if ($record->image) {
                $this->deleteAvatar($record->image, 'foods');
            }
            $uploadData = $this->uploadFile($data['image'], 'public/foods');
            $data['image'] = $uploadData['path'];
        }
        $data['price'] = $this->sanitizePrice($data['price']);
        return $this->repository->update($id, $data);
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

    public function getByMultipleId(array $ids)
    {
        return $this->repository->getByMultipleId($ids);
    }

    public function changeActive($request)
    {
        return $this->repository->changeActive($request->id);
    }

    public function changeOrder($request)
    {
        return $this->repository->changeOrder($request->id, $request->order);
    }

    private function uploadFile($data, $folderName)
    {
        $path = $data->store($folderName);

        return [
            'name' => $data->getClientOriginalName(),
            'path' => Storage::url($path),
        ];
    }

    private function deleteAvatar($avatar, $folderName)
    {
        $path = "public/$folderName/" . basename($avatar);
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }
    private function sanitizePrice($price)
    {
        return str_replace(',', '', $price) ?: null;
    }
}
