<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Found extends Model
{
    protected $fillable = [
        'name','type','address','info','img','location','phone','user_id'
    ];
    
    /**
     * 一个found对应一个user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * 招领信息的搜索功能
     *
     * @param $key
     * @return mixed
     *
     */
    public static function search($key)
    {
        return static::where('name','like',"%{$key}%")
                        ->orwhere('type','like',"%{$key}%")
                        ->orwhere('address','like',"%{$key}%")
                        ->orwhere('location','like',"%{$key}%");
    }

    /**
     * 失物信息的最新5条记录
     * 
     * @param $query
     * @return mixed
     */
    public static function scopeNewest($query)
    {
        return $query->orderBy('created_at','desc')->take(5);
    }
}
