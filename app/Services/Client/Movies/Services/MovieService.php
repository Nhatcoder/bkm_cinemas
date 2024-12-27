<?php

namespace App\Services\Client\Movies\Services;

use App\Repositories\Client\Movies\Interfaces\MoviesRepositoryInterface;
use App\Services\Client\Movies\Interfaces\MovieServiceInterface;

class MovieService implements MovieServiceInterface
{
    protected $movieRepository;
    public function __construct(MoviesRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function movieIsShowing()
    {
        return $this->movieRepository->movieIsShowing();
    }

    public function upcomingMovie()
    {
        return $this->movieRepository->upcomingMovie();
    }
    public function sliders()
    {
        return $this->movieRepository->sliders();
    }

    public function searchMovies($keyword)
    {
        return $this->movieRepository->searchMovies($keyword);
    }

    public function findMovieByslug($slug)
    {
        return $this->movieRepository->findMovieByslug($slug);

    }
}
