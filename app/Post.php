<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','content','user_id'
    ];
    
    /**
     * 一个post对应一个user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * 一个post有多个replies
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies(){
        return $this->hasMany(Replie::class);
    }

    /**
     * 操场的搜索功能
     * 
     * @param $key
     * @return mixed
     */
    public static function search($key)
    {
        return static::where('title','like',"%{$key}%");
    }

    /**
     * 操场的最新5条记录
     *
     * @param $query
     * @return mixed
     */
    public static function scopeNewest($query)
    {
        return $query->orderBy('created_at','desc')->take(5);
    }

}
