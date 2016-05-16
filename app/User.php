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

    /**
     * 一个用户对应多个sell
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sells(){
        return $this->hasMany(Sell::class);
    }

    /**
     * 一个用户对应多个course
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses(){
        return $this->hasMany(Course::class);
    }

    /**
     * 一个用户对应多个parttime
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function part_times(){
        return $this->hasMany(PartTime::class);
    }

    /**
     * 一个用户对应多个lost
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function losts(){
        return $this->hasMany(Lost::class);
    }

    /**
     * 一个用户对应多个transport
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transports(){
        return $this->hasMany(Transport::class);
    }

    /**
     * 一个用户对应多个found
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function founds(){
        return $this->hasMany(Found::class);
    }

    /**
     * 一个用户对应多个post
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(){
        return $this->hasMany(Post::class);
    }

    /**
     * 一个用户对应多个feedback
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }

    /**
     * 一个用户对应多个courseComment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courseComments(){
        return $this->hasMany(CourseComment::class);
    }

    /**
     * 一个用户对应多个transportUser
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function TransportUsers(){
        return $this->hasMany(TransportUser::class);
    }

    public function isAdmin(){
        return $this->role == 'admin';
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
