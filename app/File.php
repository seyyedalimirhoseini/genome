<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Hash;

class File extends Model
{
    use Sluggable;
    protected $fillable=['name','image','file','body','slug'];
    public function path()
    {

        return '/details/file/'. $this->slug;
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public  function download()
    {
        $timestamp = Carbon::now()->addHours(5)->timestamp;
        $hash = Hash::make('fds@#T@#56@sdgs131fasfq' . $this->id . request()->ip() . $timestamp);

        return  "/download/$this->id?mac=$hash&t=$timestamp" ;
    }


}
