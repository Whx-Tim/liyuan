<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replie extends Model
{

    /**
     * 一个replie对应一个post
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
