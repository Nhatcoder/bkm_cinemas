<?php

namespace App\Repositories\Client\Movies\Repositories;

use App\Models\Post;
use App\Models\Movie;
use App\Models\MovieGenre;
use App\Models\CategoryPost;
use App\Models\PostCategory;
use App\Repositories\Client\Movies\Interfaces\MoviesRepositoryInterface;

class MoviesRepository implements MoviesRepositoryInterface
{
    protected $movie;
    protected $movieGenre;

    public function __construct(Movie $movie, MovieGenre $movieGenre)
    {
        $this->movie = $movie;
        $this->movieGenre = $movieGenre;
    }

    public function sliders()
    {
        return $this->movie->select('slug', 'title', 'banner_movie')
            ->where([['hot', 1], ['active', 1], ['deleted_at', null]])
            ->orderBy('order', 'asc')
            ->limit(LIMIT_SLIDER);
    }

    public function movieIsShowing()
    {
        return $this->movie->select('id', 'title', 'slug', 'image', 'banner_movie', 'duration', 'trailer_url', 'format', 'release_date', 'premiere_date')
            ->where('premiere_date', '<=', date('Y-m-d'))
            ->where('active', 1)
            ->orderBy('order', 'asc')
            ->get();
    }

    public function upcomingMovie()
    {
        return $this->movie->select('id', 'title', 'slug', 'image', 'banner_movie', 'duration', 'trailer_url', 'format', 'release_date', 'premiere_date')
            ->where('premiere_date', '>', date('Y-m-d'))
            ->where('active', 1)
            ->orderBy('order', 'asc')
            ->get();
    }

    public function searchMovies($keyword){

        return $this->movie->select('id', 'title', 'slug', 'image', 'banner_movie', 'duration', 'trailer_url', 'format', 'release_date', 'premiere_date')
            ->where('title', 'like', '%' . $keyword . '%')
            ->where('active', 1)
            ->orderBy('order', 'asc')
            ->paginate(PAGINATE_SEARCH);
    }

    public function findMovieByslug($slug)
    {
        return $this->movie->where('slug', $slug)->where('active', 1)->first();
    }

}
