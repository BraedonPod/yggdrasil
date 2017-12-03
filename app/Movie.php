<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Favorite;
use App\Library_entry;
use App\Concern\Likeable;

class Movie extends Model
{
    
    use Likeable;
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'release_info'
    ];
    
    
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
    }
    
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
     * Get status of movie
     */ 
    public function status_entry()
    {
        return Library_entry::select('status')->where('user_id', Auth::id())->where('source_id', $this->id)->first();
    }
}
