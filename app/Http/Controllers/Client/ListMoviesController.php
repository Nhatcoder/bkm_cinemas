<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\Movies\Interfaces\MovieServiceInterface;
use Illuminate\Http\Request;

class ListMoviesController extends Controller
{
    protected $movieService;

    public function __construct(MovieServiceInterface $movieService)
    {
        $this->movieService = $movieService;
    }

    public function movies()
    {
        $movieIsShowing = $this->movieService->movieIsShowing();
        $upComingMovie = $this->movieService->upcomingMovie();

        return view('client.pages.movie', [
            'movieIsShowing' => $movieIsShowing,
            'upComingMovie' => $upComingMovie
        ]);
    }

    public function searchMovies(Request $request)
    {
        if (empty($request->k)) {
            return view('error.client.404');
        }
        $movies = $this->movieService->searchMovies($request->k);
        return view('client.pages.search', [
            'movies' => $movies
        ]);
    }
}
