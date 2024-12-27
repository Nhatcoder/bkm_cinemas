<?php

namespace App\Services\Client\Views\Interfaces;


interface ViewServiceInterface
{
    public function getNotifications();
    public function getSytemBySlug($slug);
}
