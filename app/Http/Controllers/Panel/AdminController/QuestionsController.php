<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class QuestionsController extends Controller
{
    public function create()
    {
        return view('Panel.Admin-Panel.Questions.questions-create');
    }
    public  function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'answer'=>'required',


        ], [
            'question.required' => 'وارد کردن سوال الزامی می باشد.',
//           'image.required'=>'انتخاب تصویر فایل الزامی می باشد.',
            'answer.required'=>'وارد کردن جواب الزامی است.',

        ]);
        $questions=Question::create($request->all());
        session::put('msg', 'سوال با موفقیت ذخیره شد.');
        return redirect(route('panel.questions.show'));

    }

    public function show()
    {
        $questions=Question::latest()->paginate(5);
        return view('Panel.Admin-Panel.Questions.questions-show',compact('questions'));
    }
    public function update(Request $request,Question $question)
    {
        $question->update($request->all());
        session::put('msg', 'سوال با موفقیت بروزرسانی شد.');
        return redirect(route('panel.questions.show'));
    }
    public function delete(Request $request,Question $question)
    {
        $question->delete();
        session::put('msg', 'سوال با موفقیت حذف شد.');
        return redirect(route('panel.questions.show'));
    }
}
