<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Course extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(CourseComment::class);
    }
}
