<?php
namespace App\Services\Base;
use App\Repositories\Base\RepositoryInterface;
use App\Services\Base\BaseServiceInterface;

abstract class BaseService implements BaseServiceInterface
{
    protected $repository;

    public function __construct()
    {
        $this->setRepository();
    }

    abstract public function getRepository();

    public function setRepository()
    {
        $this->repository = app()->make($this->getRepository());
        if (!$this->repository) {
            throw new \Exception("Repository not found.");
        }
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function create(&$data)
    {
        return $this->repository->create($data);
    }


    public function update(&$data, $id)
    {
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
