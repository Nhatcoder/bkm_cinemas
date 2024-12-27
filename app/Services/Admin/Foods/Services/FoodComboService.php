<?php

namespace App\Services\Admin\Foods\Services;
use App\Repositories\Admin\Foods\Interfaces\FoodComboInterface;
use App\Services\Admin\Foods\Interfaces\FoodComboServiceInterface;
use App\Services\Base\BaseService;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Storage;

class FoodComboService extends BaseService implements FoodComboServiceInterface
{
    use StorageImageTrait;

    public function __construct()
    {
        parent::__construct();
    }
    public function getRepository()
    {
        return FoodComboInterface::class;
    }
    public function filter($request){
        return $this->repository->filter($request);
    }

    public function create(&$data)
    {
        if (isset($data['food_combo']['image']) && $data['food_combo']['image']) {
            $uploadData = $this->uploadFile($data['food_combo']['image'], 'public/foodCombos');
            $data['food_combo']['image'] = $uploadData['path'];
        }
        $data['food_combo']['price'] = $this->sanitizePrice($data['food_combo']['price']);
        return $this->repository->create($data);
    }

    public function update(&$data, $id)
    {
        $record = $this->find($id);
        if (!$record) {
            return false;
        }

        if (isset($data['food_combo']['image']) && $data['food_combo']['image']) {
            if ($record->image) {
                $this->deleteAvatar($record->image, 'foodCombos');
            }
            $uploadData = $this->uploadFile($data['food_combo']['image'], 'public/foodCombos');
            $data['food_combo']['image'] = $uploadData['path'];
        }
        $data['food_combo']['price'] = $this->sanitizePrice($data['food_combo']['price']);
        if (!empty($data['item'])) {
            $this->repository->createManyItem($record, $data['item']);
        }
        if (!empty($data['old_item'])) {
            $existingIds = $record->items->pluck('id')->toArray();

            $newIds = array_column($data['old_item'], 'id');

            $idsToDelete = array_diff($existingIds, $newIds);

            if (!empty($idsToDelete)) {
                $this->repository->deleteMultipleItem($record, $idsToDelete);
            }

            $this->repository->updateItem($record, $data['old_item']);
        }
        return $this->repository->update($id, $data['food_combo']);
    }

    public function deleteMultipleChecked($request)
    {
        if (count($request->selectedIds) < 0) {
            return false;
        }
        $this->repository->deleteMultiple($request->selectedIds);
        return true;
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
