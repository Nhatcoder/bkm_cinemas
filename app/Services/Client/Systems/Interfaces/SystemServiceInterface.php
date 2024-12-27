<?php

namespace App\Services\Client\Systems\Interfaces;

interface SystemServiceInterface{
    public function getSytemBySlug($slug);
    public function getSystemByType($type);
}
