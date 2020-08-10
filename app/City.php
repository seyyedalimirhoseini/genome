<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded=['id'];
    public function state()
    {
        return $this->belongsTo('App\state', 'state_id')->withDefault(['name'=>'---']);
    }
    public function users()
    {
        return $this->hasMany('App\User','city_id');
    }
//    public function children()
//    {
//        return $this->hasMany('App\City','parent_id', 'id');
//    }
}
