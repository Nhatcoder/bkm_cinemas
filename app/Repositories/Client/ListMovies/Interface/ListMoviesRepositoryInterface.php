<?php


namespace App\Repositories\Client\ListMovies\Interface;

interface ListMoviesRepositoryInterface
{
    public function movieIsShowing();
    public function upcomingMovie();
}
