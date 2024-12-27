<?php
namespace App\Services\Base;

interface BaseServiceInterface
{
    public function getAll();
    public function find($id);
    public function create(&$data);
    public function update(&$data, $id);
    public function delete($id);
}
