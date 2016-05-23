<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lost extends Model
{
    protected $fillable = [
        'info','type','content','address','phone','user_id'
    ];

    /**
     * 一个lost对应一个user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * 失物信息的搜索功能
     * 
     * @param $key
     * @return mixed
     */
    public static function search($key)
    {
        return static::where('info','like',"%{$key}%");
    }
}
