<?php

namespace App\Repositories\Admin\Tags\Interfaces;

interface TagInterface
{
    public function tagsSelected($id);
    public function changeActive($id);
    public function changeOrder($id, $order);
    public function getAllActive();
}
