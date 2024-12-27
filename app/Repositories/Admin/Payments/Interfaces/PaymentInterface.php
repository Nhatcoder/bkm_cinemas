<?php
namespace App\Repositories\Admin\Payments\Interfaces;

use App\Repositories\Base\RepositoryInterface;

interface PaymentInterface extends RepositoryInterface {
    public function getAllActive();
    public function filter($request);
    public function changeActive($id);
}
