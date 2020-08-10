<?php

namespace App\Http\Controllers\HomeController;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    // Show News Show
    public function index()
    {
        $news=News::latest()->paginate(5);
        return view('UI.News.news-show',compact('news'));
    }

    // Show News Page
//    public function showNewsPage()
//    {
//        return view('UI.News.news-page');
//    }
}
