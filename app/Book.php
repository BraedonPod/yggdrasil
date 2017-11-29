<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Book extends Model
{
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published'
    ];
    
    /**
     * Get the tags for the book.
     *
     * @return \Illuminate\Database\Eloquent\Relations\morphToMany
     */
    public function genres()
    {
        return $this->morphToMany('App\Genre', 'source_genre');
    }
    
    /**
     * Get all of the books comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
