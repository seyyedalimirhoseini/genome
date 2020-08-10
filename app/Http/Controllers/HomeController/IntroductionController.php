<?php

namespace App\Http\Controllers\HomeController;

use App\Committee;
use App\Event;
use App\News;
use App\Speaker;
use App\Poster;
use App\Slider;
use App\Tizer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntroductionController extends Controller
{
    public function showIntroductionPage()
    {
        $sliders=Slider::latest()->orderBy('id','DESC')->get();
        $cores=Event::latest()->orderBy('id','DESC')->get();
        $organizers=Speaker::latest()->orderBy('id','DESC')->get();
        $committees=Committee::latest()->orderBy('id','DESC')->get();
        return view('UI.Introduction.introduction',compact('sliders','cores','organizers','committees'));
    }
}
