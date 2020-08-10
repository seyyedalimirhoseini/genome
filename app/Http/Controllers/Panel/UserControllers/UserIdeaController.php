<?php

namespace App\Http\Controllers\Panel\UserControllers;

use App\Course;
use App\Field;
use App\Idea;
use App\User;
use App\Useridea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
class UserIdeaController extends Controller
{
    // Show Idea Register
    public function index()
    {
        $courses=Course::all();
        $ideas=Idea::orderBy('id','desc')->where('user_id','=',Auth::user()->id)->where('status','=',3)->orWhere('status', '=', 1)->where('user_id','=',Auth::user()->id)->paginate(10);

        return view('Panel.User-Panel.User-Idea.idea-show',compact('ideas','courses'));
    }
    public function create()
    {
        $fields=Field::all()->pluck('name','id');
        $courses=Course::all();
        return view('Panel.User-Panel.User-Idea.idea-create',compact('courses','fields'));

    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
//            'field_id' => 'required',
            'description' => 'required',



        ], [
            'title.required' => 'وارد کردن عنوان ایده الزامی می باشد.',
//            'field_id.required'=>'وارد کردن رشته تحصیلی الزامی می باشد.',
            'description.required'=>'وارد کردن متن ایده الزامی می باشد.',

        ]);
        $Date=[
        'title'=>$request->input('title'),
        'field_id'=>$request->input('field_id'),
        'description'=>$request->input('description'),
        'user_name'=>Auth::user()->name,
            'user_id'=>Auth::user()->id,
        ];

        $newIdea=Idea::create($Date);

//        $data=array();
//        $data['title']=$request->title;
//        $data['field']=$request->field;
//        $data['description']=$request->description;
//        $data['user_id']=Auth::user()->id;
        session::put('msg', 'ایده با موفقیت ذخیره شد.');

        return redirect(route('idea.show',compact('newIdea')));
    }
        public function edit(Idea $idea)
        {
            $courses=Course::all();
            return view('Panel.User-Panel.user-idea.idea-edit',compact('idea','courses'));

        }
    public function update(Request $request,Idea $idea)
    {
        $this->validate($request, [
            'title' => 'required',
//            'field_id' => 'required',
            'description' => 'required',



        ], [
            'title.required' => 'وارد کردن عنوان ایده الزامی می باشد.',
//            'field_id.required'=>'وارد کردن رشته تحصیلی الزامی می باشد.',
            'description.required'=>'وارد کردن متن ایده الزامی می باشد.',

        ]);
       $updateidea= $idea->update([
            'title'=>$request->input('title'),
            'field_id'=>$request->input('field'),
            'description'=>$request->input('description'),
            'user_name'=>Auth::user()->name,
            'user_id'=>Auth::user()->id,
        ]);



        if ($updateidea){
            session::put('msg', 'ایده با موفقیت  بروز رسانی شد.');
            return redirect(route('idea.show'));
        }else{
            session::put('msg', 'ایده با موفقیت  بروز رسانی نشد.');
            return redirect(route('idea.show'));
        }



    }
    public function delete(Idea $idea)
    {
        if ($idea->status ==1)
        {
            $isDeleted= $idea->update(['status'=>2]);
            if ($isDeleted) {
                session::put('msg', 'ایده با موفقیت حذف شد.');
                return redirect(route('idea.show'));
            }else{
                session::put('msg', 'ایده با موفقیت حذف نشد.');
                return redirect(route('idea.show'));
            }
        }
        else{
            $isDeleted= $idea->update(['status'=>0]);
            if ($isDeleted) {
                session::put('msg', 'ایده با موفقیت حذف شد.');
                return redirect(route('idea.show'));
            }else{
                session::put('msg', 'ایده با موفقیت حذف نشد.');
                return redirect(route('idea.show'));
            }
        }

    }
    // Show Edit Idea
//    public function showEditIdea()
//    {
//        return view('Panel.User-Panel.User-Idea.idea-edit');
//    }
}
