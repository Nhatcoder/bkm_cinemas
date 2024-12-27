<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Post;
use App\Services\Client\Movies\Interfaces\MovieServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MovieDetailController extends Controller
{
    private $movieService;
    public function __construct(MovieServiceInterface $movieService) {
        $this->movieService = $movieService;
    }
    public function movieDetail($slug)
    {
        if (!$this->movieService->findMovieByslug($slug)) {
            return view('error.client.404');
        }
        $now = Carbon::now();
        $movies = Movie::where('active', 1)
            ->where('release_date', '>=', $now)
            ->where('slug', '!=', $slug)
            ->limit(4)
            ->get();
        $posts = Post::where('active', '1')
            ->limit(12)
            ->get();
        return view('client.pages.movie-detail', [
            'slug' => $slug,
            'movies' => $movies,
            'posts' => $posts,
        ]);
    }
}
