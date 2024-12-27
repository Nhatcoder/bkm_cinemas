<?php
namespace App\Services\Admin\Cinemas\Services;
use App\Repositories\Admin\Cinemas\Interfaces\CinemaInterface;
use App\Services\Admin\Cinemas\Interfaces\CinemaServiceInterface;
use App\Services\Base\BaseService;
use Illuminate\Support\Facades\Storage;

class CinemaService extends BaseService implements CinemaServiceInterface
{
    public function getRepository()
    {
        return CinemaInterface::class;
    }
    public function filter($request)
    {
        return $this->repository->filter($request);
    }

    public function getCinemaByArea($area_id){
        return $this->repository->getCinemaByArea($area_id);
    }

    public function create(&$data)
    {
        if (isset($data['image']) && $data['image']) {
            $uploadData = $this->uploadFile($data['image'], 'public/cinemas');
            $data['image'] = $uploadData['path'];
        }
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
                $this->deleteAvatar($record->image, 'cinemas');
            }
            $uploadData = $this->uploadFile($data['image'], 'public/cinemas');
            $data['image'] = $uploadData['path'];
        }
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
}
