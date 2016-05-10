<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartTime extends Model
{
    protected $guarded = ['_token'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
