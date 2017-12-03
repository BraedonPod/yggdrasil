<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    /**
     * Show all the movies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::orderBy('title', 'asc')->withCount('likes')->paginate(10);
        if(empty($movies)){abort(404);}
        return view('movie.index')->with('movies', $movies);
    }
    
    /**
     * Show a single movie.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $movie = Movie::where('slug', $slug)->first();
        if(empty($movie)){abort(404);}
        $movie->likes_count = $movie->likes()->count();
        return view('movie.show')->with('movie', $movie);
    }
}
