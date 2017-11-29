<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    /**
     * Get all of the articles that are assigned this tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorpheByMany
     */
    public function movies()
    {
        return $this->morphedByMany('App\Movie', 'source_star');
    }
}
