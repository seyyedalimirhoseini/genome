<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterCourse extends Model
{
//    protected $fillable=['name','lastname','user_id','title_course','date','clock','status','course_id'];
    protected $guarded=['id'];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function Course()
    {
        return $this->belongsTo('App\Course','course_id');
    }
}
