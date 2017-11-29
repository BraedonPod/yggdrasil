<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Favorite;
use App\Library_entry;

class Movie extends Model
{
    /**
     * Get the tags for the movies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\morphToMany
     */
    public function genres()
    {
        return $this->morphToMany('App\Genre', 'source_genre');
    }
    
    /**
     * Get all of the stars.
     */
    public function stars()
    {
        return $this->morphToMany('App\Star', 'source_star');
    }
    
    /**
     * Get all of the directors.
     */    
    public function directors()
    {
        return $this->morphToMany('App\Director', 'source_director');
    }
    
     /**
     * Get all of the movie's comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
    
    /**
     * Get true/false of movie is fav.
     */  
    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())->where('movie_id', $this->id)->first();
    }
    
    
    /**
     * Get status of movie
     */ 
    public function status_entry()
    {
        return Library_entry::select('status')->where('user_id', Auth::id())->where('source_id', $this->id)->first();
    }
}
