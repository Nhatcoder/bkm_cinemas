<?php

namespace App\Repositories\Client\Systems\Repositories;

use App\Models\System;
use App\Repositories\Client\Systems\Interfaces\SystemInterface;

class SystemRepository implements SystemInterface
{
    private $system;
    public function __construct(System $system)
    {
        $this->system = $system;
    }

    public function getSytemBySlug($slug)
    {
        return $this->system
            ->where('slug', $slug)
            ->where('active', 1)
            ->with(['childs' => function($query){
                $query->where('active', 1)
                      ->orderBy('order');
            }])
            ->first();
    }

    public function getSystemByType($type)
    {
        return $this->system
            ->where('type', $type)
            ->where('active', 1)
            ->orderBy('order')
            ->limit(3)
            ->get();
    }
}
