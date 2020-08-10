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

class HomeController extends Controller
{
    // Show Home Page
    public function showHomePage()
    {
            $sliders=Slider::latest()->orderBy('id','DESC')->get();
            $cores=Event::latest()->orderBy('id','DESC')->get();
            $organizers=Speaker::latest()->orderBy('id','DESC')->get();
            $committees=Committee::latest()->orderBy('id','DESC')->get();
            $tizer=Tizer::latest()->orderBy('id','DESC')->limit(1)->get();
            $poster=Poster::latest()->orderBy('id','DESC')->limit(1)->get();
        $news=News::latest()->orderBy('id','DESC')->where('publication_status',1)->limit(4)->get();
        return view('UI.Home.home-page',compact('news','sliders','cores','organizers','committees','tizer','poster'));
    }
    public function details($slug)
    {

        $new=News::where('slug',$slug)->first();
            if (!$new)
            {
                return   abort(404);
            } else{
                return view('UI.News.news-page',compact('new'));

            }
    }


}