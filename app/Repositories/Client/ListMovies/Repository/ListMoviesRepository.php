<?php

namespace App\Repositories\Client\ListMovies\Repository;

use App\Models\Post;
use App\Models\Movie;
use App\Models\MovieGenre;
use App\Models\CategoryPost;
use App\Models\PostCategory;
use App\Repositories\Client\ListMovies\Interface\ListMoviesRepositoryInterface;

class ListMoviesRepository implements ListMoviesRepositoryInterface
{
    protected $movie;
    protected $movieGenre;
    protected $post;
    protected $categoryPost;
    protected $postCategory;


    public function __construct(Movie $movie, MovieGenre $movieGenre, Post $post, CategoryPost $categoryPost, PostCategory $postCategory)
    {
        $this->movie = $movie;
        $this->post = $post;
        $this->categoryPost = $categoryPost;
        $this->postCategory = $postCategory;
        $this->movieGenre = $movieGenre;
    }

    public function movieIsShowing()
    {
        return $this->movie->select('id', 'title', 'slug', 'image', 'duration', 'trailer_url', 'format', 'release_date')
            ->where([['release_date', '<=', date('Y-m-d')], ['active', 1], ['deleted_at', null]])
            ->orderBy('order', 'asc')
            ->orderBy('release_date', 'desc')
            ->get();
        // ->paginate(PAGINATE_LIST_MOVIE);
    }

    public function upcomingMovie()
    {
        return $this->movie->select('id', 'title', 'slug', 'image', 'duration', 'trailer_url', 'format', 'release_date')
            ->where([['release_date', '>', date('Y-m-d')], ['active', 1], ['deleted_at', null]])
            ->orderBy('order', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        // ->paginate(PAGINATE_LIST_MOVIE);
    }
}
