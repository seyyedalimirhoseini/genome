<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name','lastname', 'nationalcode','phone','email','field','degree','address', 'password','image','state','city'
//    ];
    protected $guarded=['id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function city()
    {
        return $this->belongsTo('App\City','city_id');
    }
    public function state()
    {
        return $this->belongsTo('App\State','state_id');
    }
    public function ideas()
    {
        return $this->hasMany('App\Idea','user_id');
    }
    public function  registercourses()
    {
        return $this->hasMany('App\RegisterCourse','user_id');
    }
    public function isAdmin()
    {
        return $this->role == 'admin' ? true : false;
    }
    public function isUser()
    {
        return $this->role == 'user' ? true : false;
    }
}
