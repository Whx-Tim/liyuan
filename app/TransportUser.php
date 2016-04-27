<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportUser extends Model
{
    /**
     * 一个transportUser对应一个user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * 一个transportUser对应一个transport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transport(){
        return $this->belongsTo(Transport::class);
    }
}
