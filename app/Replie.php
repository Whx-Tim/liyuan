<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replie extends Model
{
    protected $guarded = [];

    /**
     * 一个replie对应一个post
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post(){
        return $this->belongsTo(Post::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
