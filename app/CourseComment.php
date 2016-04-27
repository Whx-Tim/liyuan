<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseComment extends Model
{
    /**
     * 一个CourseComment只有一个course
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(){
        return $this->belongsTo(Course::class);
    }

    /**
     * 一个CourseComment只有一个user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
