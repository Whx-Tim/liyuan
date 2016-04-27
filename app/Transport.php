<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    /**
     * 一个transport对应一个user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * 一个transport对应多个transportUser
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transportUsers(){
        return $this->hasMany(TransportUser::class);
    }
}
