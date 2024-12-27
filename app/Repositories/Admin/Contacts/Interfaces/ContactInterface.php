<?php
namespace App\Repositories\Admin\Contacts\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface ContactInterface extends RepositoryInterface
{
    public function filter($request);
}
