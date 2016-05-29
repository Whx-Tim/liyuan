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

    /**
     * 二手交易的搜索功能
     * 
     * @param $key
     * @return mixed
     */
    public static function search($key)
    {
        return static::where('title','like',"%{$key}%");
    }

    /**
     * 二手交易的最新5条记录
     * 
     * @param $query
     * @return mixed
     */
    public static function scopeNewest($query)
    {
        return $query->orderBy('created_at','desc')->take(5);
    }
}
