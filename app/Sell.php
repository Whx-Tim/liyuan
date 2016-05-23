<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $guarded = ['_token'];

    /**
     * 一个sell对应一个user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function search($key)
    {
        return static::where('title','like',"%{$key}%");
    }
}
