<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable=['name'];
    public function idea()
    {
        return $this->hasMany('App\Idea','field_id');
    }
}
