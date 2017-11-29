<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
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
