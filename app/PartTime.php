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

    /**
     * PartTime表的模糊查询
     * 
     * @param $key
     * @return mixed
     */
    public static function search($key)
    {
        return static::where('title','like',"%{$key}%");
    }
}
