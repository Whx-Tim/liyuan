<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = ['_token'];

    /**
     * 一个course只有一个user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * 一个course对应多个courseComment
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(){
        return $this->hasMany(CourseComment::class);
    }

    /**
     * 课程交换的搜索功能
     * 
     * @param $key
     * @return mixed
     */
    public static function search($key)
    {
        return static::where('name','like',"%{$key}%")
                        ->orwhere('course_number','like',"%{$key}%")
                        ->orwhere('time','like',"%{$key}%")
                        ->orwhere('teacher','like',"%{$key}%")
                        ->orwhere('want_name','like',"%{$key}%")
                        ->orwhere('want_teacher','like',"%{$key}%");
    }

    /**
     * 课程交换最新的5条记录
     * 
     * @param $query
     * @return mixed
     */
    public static function scopeNewest($query)
    {
        return $query->orderBy('created_at','desc')->take(5);
    }
}
