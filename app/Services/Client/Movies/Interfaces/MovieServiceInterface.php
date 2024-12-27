<?php

namespace App\Services\Client\Movies\Interfaces;

interface MovieServiceInterface
{
    public function movieIsShowing();
    public function upcomingMovie();
    public function sliders();
    public function searchMovies($keyword);
    public function findMovieByslug($slug);
}
