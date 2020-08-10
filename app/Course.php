<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected  $fillable=['title','points','date','clock','price'];
    public function registercourses()
    {
        return $this->hasMany('App\RegisterCourse','course_id');
    }
}
