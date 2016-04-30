<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parttime extends Model
{
    /**
     * 一个parttime对应一个user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
