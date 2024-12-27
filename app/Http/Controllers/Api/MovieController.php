<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Movie::where('active', '1')->get());
    }

    /**
     * Store a newly created resource in storage
     */
    public function store(Request $request)
    {
        $movie = Movie::create($request->all());
        return response()->json($movie);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $identifier)
    {
        $movie = Movie::where('id', $identifier)
            ->orWhere('slug', $identifier)
            ->with(['actors', 'movieGenre', 'showtimes'])
            ->first();

        if (!$movie) {
            return response()->json(['error' => 'Movie not found'], 404);
        }
        return response()->json($movie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::find($id);
        $movie->update($request->all());
        return response()->json($movie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return response()->json($movie);
    }
}
