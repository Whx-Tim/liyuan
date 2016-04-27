<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lost extends Model
{

    /**
     * 一个lost对应一个user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
