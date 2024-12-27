<?php

namespace App\Services\Admin\Payments\Services;

use App\Repositories\Admin\Payments\Interfaces\PaymentInterface;
use App\Services\Admin\Payments\Interfaces\PaymentServiceInterface;
use App\Services\Base\BaseService;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Storage;

class PaymentService extends BaseService implements PaymentServiceInterface
{

    use StorageImageTrait;

    public function filter($request)
    {
        return $this->repository->filter($request);
    }

    public function getRepository()
    {
        return PaymentInterface::class;
    }

    public function getAll(): mixed
    {
        return $this->repository->getAll();
    }

    public function create(&$data)
    {

        if (isset($data['image']) && $data['image']) {
            $uploadData = $this->uploadFile($data['image'], 'public/payments');
            $data['image'] = $uploadData['path'];
        }
        return $this->repository->create($data);
    }


    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function update(&$data, $id)
    {
        $record = $this->find($id);

        if (!$record) {
            return false;
        }

        if (isset($data['image']) && $data['image']) {
            if ($record->image) {
                $this->deleteAvatar($record->image, 'payments');
            }
            $uploadData = $this->uploadFile($data['image'], 'public/payments');
            $data['image'] = $uploadData['path'];
        }
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        $payment = $this->find($id);

        if ($payment->image) {
            Storage::disk('public')->delete($payment->image);
        }

        return $this->repository->delete($id);
    }

    public function changeActive($request)
    {
        return $this->repository->changeActive($request->id);
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
