<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CoursesController extends Controller
{
//    // Show Add Course
//    public function showAddCourse()
//    {
//        return view('Panel.Admin-Panel.Courses.course-add');
//    }
//
//    // Show Courses
//    public function showCourses()
//    {
//        return view('Panel.Admin-Panel.Courses.course-show');
//    }
//
//    // Show Edit Course
//    public function showEditCourse()
//    {
//        return view('Panel.Admin-Panel.Courses.course-edit');
//
//    }

    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('Panel.Admin-Panel.courses.course-show', compact('courses'));
    }
    public function create()
    {
        return view('Panel.Admin-Panel.courses.course-create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'points' => 'required|numeric',
            'date' => 'required',
            'clock' => 'required',
            'price'=>'required|numeric',


        ], [
            'title.required' => 'وارد کردن نام دوره الزامی می باشد.',
            'points.required'=>'وارد کردن امتیاز دوره الزامی می باشد.',
            'points.numeric'=>'امتیاز دوره باید عدد باشد.',
            'date.required'=>'وارد کردن تاریخ دوره الزامی می باشد.',
            'clock.required'=>'وارد کردن ساعت دوره الزامی می باشد.',
            'price.required'=>'وارد  کردن قیمت دوره الزامی می باشد.',
            'price.numeric'=>'قیمت دوره باید عدد باشد.',
        ]);
        $courses=Course::create($request->all());

        session::put('msg', 'دوره با موفقیت ذخیره شد.');

        return redirect(route('courses.show',compact('courses')));
    }
    public function  edit(Course $course)
    {

        return view('Panel.Admin-Panel.courses.course-edit',compact('course'));
    }
    public function update(Request $request,Course $course)
    {
        $this->validate($request, [
            'title' => 'required',
            'points' => 'required|numeric',
            'date' => 'required',
            'clock' => 'required',
            'price'=>'required|numeric',

        ], [
            'title.required' => 'وارد کردن نام دوره الزامی می باشد.',
            'points.required'=>'وارد کردن امتیاز دوره الزامی می باشد.',
            'points.numeric'=>'امتیاز دوره باید عدد باشد.',
            'date.required'=>'وارد کردن تاریخ دوره الزامی می باشد.',
            'clock.required'=>'وارد کردن ساعت دوره الزامی می باشد.',
            'price.required'=>'وارد  کردن قیمت دوره الزامی می باشد.',
            'price.numeric'=>'قیمت دوره باید عدد باشد.',
        ]);
        $course->update($request->all());
        session::put('msg', 'دوره با موفقیت  بروز رسانی شد.');
        return redirect(route('courses.show'));
    }
    public function delete(Course $course)
    {
        $isDeleted= $course->delete();
        if ($isDeleted) {
            session::put('msg', 'دوره با موفقیت حذف شد.');
            return redirect(route('courses.show'));
        }else{
            session::put('msg', 'دوره با موفقیت حذف نشد.');
            return redirect(route('courses.show'));
        }
    }
}
