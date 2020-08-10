<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\Http\Controllers\Controller;
use App\RegisterCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterCourseController extends Controller
{
  public function index()
  {
      $users_register_course=RegisterCourse::latest()->where('status',1)->paginate(10);
      return view('Panel.Admin-Panel.user-register-course.user-register-course',compact('users_register_course'));
  }
    public function delete(RegisterCourse $registerCourse)
    {
        $isDeleted= $registerCourse->delete();
        if ($isDeleted) {
            session::put('msg', 'کاربر از دوره حذف شد.');
            return redirect(route('users.register.course'));
        }else{
            session::put('msg', 'کاربر از دوره حذف نشد.');
            return redirect(route('users.register.course'));
        }
    }
}
