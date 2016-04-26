<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Parttime extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}
