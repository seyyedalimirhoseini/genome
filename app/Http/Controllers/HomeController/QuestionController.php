<?php

namespace App\Http\Controllers\HomeController;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public  function index()
    {
       $questions= Question::all();
        return view('UI.Questions.questions', compact('questions'));
    }
}
