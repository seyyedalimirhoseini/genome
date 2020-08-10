<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
//    protected $fillable=['title','field','description','user_name','user_id','status'];
   protected $guarded=['id'];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function field()
    {
        return $this->belongsTo('App\Field','field_id');
    }
}
