<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * Get all of the movies that are assigned this tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorpheByMany
     */
    public function movies()
    {
        return $this->morphedByMany('App\Movie', 'source_genre');
    }
    
    /**
     * Get all of the books that are assigned this tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorpheByMany
     */
    public function books()
    {
        return $this->morphedByMany('App\Book', 'source_genre');
    }
}
