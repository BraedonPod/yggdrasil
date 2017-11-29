<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Favorite;

class MovieController extends Controller
{
    /**
     * Favorite a particular movie
     *
     * @param  Movie $movie
     * @return Response
     */
    public function favoriteMovie($movie)
    {
        //Auth::user()->favorites()->attach($movie->id);
        
        //return back();
        // $fav = Favorite::create([
        //     'user_id' => 2,
        //     'movie_id' => $movie
        // ]);
        
        return response()->json(200);
    }
    
    /**
     * Unfavorite a particular movie
     *
     * @param  Movie $movie
     * @return Response
     */
    public function unFavoriteMovie(Movie $movie)
    {
        Auth::user()->favorites()->detach($movie->id);
    
        return back();
    }
}
