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

    public static function search($key)
    {
        return static::where('name','like',"%{$key}%")
                        ->orwhere('course_number','like',"%{$key}%")
                        ->orwhere('time','like',"%{$key}%")
                        ->orwhere('teacher','like',"%{$key}%")
                        ->orwhere('want_name','like',"%{$key}%")
                        ->orwhere('want_teacher','like',"%{$key}%");
    }
}
