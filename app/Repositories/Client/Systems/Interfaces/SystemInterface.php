<?php

namespace App\Repositories\Client\Systems\Interfaces;

interface SystemInterface
{
    public function getSytemBySlug($slug);
    public function getSystemByType($type);
}
