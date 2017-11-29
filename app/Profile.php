<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['about','birthday','location', 'gender', 'name', 'avatar', 'banner', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
