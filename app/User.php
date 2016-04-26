<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','phone','sex','bornDate','content','stuNumber'
    ];

    protected $guarded = [

    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sells(){
        return $this->hasMany(Sell::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function parttimes(){
        return $this->hasMany(Parttime::class);
    }
//
//    /**
//     * @param $attribute
//     */
//    public function setPasswordAttribute($attribute)
//    {
//        $this->password = bcrypt($attribute);
//    }
}
