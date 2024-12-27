<?php

namespace App\Services\Admin\Notifications\Services;

use App\Repositories\Admin\Notifications\Interfaces\NotificationInterface;
use App\Services\Admin\Notifications\Interfaces\NotificationServiceInterface;
use App\Services\Base\BaseService;

class NotificationService extends BaseService implements NotificationServiceInterface
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getRepository()
    {
        return NotificationInterface::class;
    }

    public function getByType($type)
    {
        return $this->repository->getByType($type);
    }
    public function filter($request)
    {
        return $this->repository->filter($request);
    }

    public function create(&$data)
    {
        return $this->repository->create($data);
    }

    public function update(&$data, $id)
    {
        $record = $this->find($id);
        if (!$record) {
            return false;
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

    public function getByCinemaId($cinema_id)
    {
        return $this->repository->getByCinemaId($cinema_id);
    }

}
