<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Return the user's profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
    
    /**
     * Return the user's comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'user_id');
    }
    
    public function favorites()
    {
        return $this->belongsToMany('App\Movie', 'favorites', 'user_id', 'movie_id')->withTimeStamps();
    }
    
    
    public function library_entries_movies()
    {
        return $this->belongsToMany('App\Movie', 'library_entries', 'user_id','source_id')->withTimeStamps();
    }
    
    public function library_entries_books()
    {
        return $this->belongsToMany('App\Book', 'library_entries', 'user_id','source_id')->withTimeStamps();
    }
}
