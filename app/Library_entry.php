<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library_entry extends Model
{
    protected $fillable = ['user_id','source_id','status','notes','rating','source_type','started_at','finished_at'];
}
