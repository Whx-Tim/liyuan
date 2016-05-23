<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $guarded = ['_token','_method'];
    
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
    public function transport_user(){
        return $this->hasOne(TransportUser::class);
    }

    /**
     * 快递帮取的搜索功能
     * 
     * @param $key
     * @return mixed
     */
    public static function search($key)
    {
        return static::where('address','like',"%{$key}%")
                        ->orwhere('time','like',"%{$key}%")
                        ->orwhere('company','like',"%{$key}%")
                        ->orwhere('reward','like',"%{$key}%");
    }
}
