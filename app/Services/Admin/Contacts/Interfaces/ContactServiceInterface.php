<?php
namespace App\Services\Admin\Contacts\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface ContactServiceInterface extends BaseServiceInterface
{
    public function filter($request);
}
