<?php

namespace App\Services\Admin\Orders\Interfaces;

use App\Services\Base\BaseServiceInterface;

interface OrderServiceInterface extends BaseServiceInterface
{
    public function changeGetTickets($id);
    public function filter($request);
    public function changeManyTickets();

}
