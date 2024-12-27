<?php

namespace App\Repositories\Admin\Orders\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface OrderInterface extends RepositoryInterface
{
    public function changeGetTickets($id);
    public function filter($request);
    public function changeManyTickets();
}
