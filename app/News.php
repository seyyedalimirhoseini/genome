<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class News extends Model
{
    use Sluggable;
   protected  $fillable=['title','image','body','slug'];
public function path()
{

    return '/details/new/'. $this->slug;
}
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
