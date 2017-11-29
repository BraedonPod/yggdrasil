<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'user_id',
      'commentable_id',
      'body',
      'parent_id',
      'commentable_type',
      'like'
    ];
     /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }
    
    /**
     * Return the comment's author
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    /**
     * Return the comment's replies
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function replies() {
        return $this->hasMany(Self::class, 'parent_id');
    }
}
