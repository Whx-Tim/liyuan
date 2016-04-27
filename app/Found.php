<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Found extends Model
{
    /**
     * 一个found对应一个user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
