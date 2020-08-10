<?php

namespace App\Http\Controllers\Panel\UserControllers;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Panel\AdminController\CoursesController;
use App\RegisterCourse;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;
use Zarinpal\Zarinpal;
session_start();
class RegisterCourseController extends Controller
{
    public function index()
    {

        $register=RegisterCourse::where('user_id',Auth::user()->id)->where('status',1)->first();

//    $register=DB::table('register_courses')->where('user_id',Auth::user()->id)->pluck('id','course_id');
//    dd($registers);
        $courses=Course::latest()->paginate(10);

//        $registercourses=RegisterCourse::where('user_id',Auth::user()->id)->latest()->paginate(10);
        return view('Panel.User-Panel.user-register-course.user-register-courses',compact('courses','register'));
    }

    public function pay_by_zarinpal(Course $course)
    {
        $order=array(
            $course->id,$course->title, $course->points, $course->clock, $course->date, $course->price
        );
      Session::put('register',$order);
        Session::save();
           $total_cart = $course->price;
        $name = auth()->user()->name;
        $email = auth()->user()->email;
        $zarinpal = new Zarinpal('aae0a368-021a-11e6-a1db-005056a205be');
        $zarinpal->enableSandbox(); // active sandbox mod for test env
       //$zarinpal->isZarinGate(); // active zarinGate mode
        $results = $zarinpal->request(
            route('payment.zarinpal.callback'),          //required
            $total_cart,                                  //required
            $name,                             //required
            $email,                      //optional
            '09000000000',                         //optional
            [                          //optional
                "Wages" => [
                    "zp.1.1" => [
                        "Amount" => 120,
                        "Description" => "part 1"
                    ],
                    "zp.2.5" => [
                        "Amount" => 60,
                        "Description" => "part 2"
                    ]
                ]
            ]
        );
        echo json_encode($results);
        if (isset($results['Authority'])) {
            file_put_contents('Authority', $results['Authority']);
            $zarinpal->redirect();
        }
    }
    public function zarinpalCallback()
    {
        $status=$_GET['Status'];
        if ($status =='OK')
        {
             $this->register();

           alert()->success('شما با موفقیت در دوره ثبت نام شدید', 'با تشکر')->persistent('باشه');
           return Redirect::to('/user/courses');
        }elseif ($status == 'NOK') {
            echo 'پرداخت با موفقیت انجام نشد!';

        }

    }
    public function register()
    {
        $Authority = $_GET['Authority'];

//            $register_user=session()->get('register');

        if (session()->has('register'))
        {
            $register=RegisterCourse::create(['course_id' =>session('register')[0],'title_course' =>session('register')[1], 'points' => session('register')[2], 'clock' => session('register')[3],'date'=>session('register')[4],'price'=>session('register')[5], 'name' => Auth::user()->name, 'lastname'=>Auth::user()->lastname,'user_id' => Auth::user()->id ,'status'=>1,'Authority'=>$Authority]);
            session()->put('register',null);
        }else{
            echo 'با عرض پوزش خطایی رخ داده است.';
        }


            }






//    public function delete(RegisterCourse $registerCourse)
//    {
//
////        $isUpdated=$registerCourse->update(['status'=>0]);
//        $isDelete=$registerCourse->delete();
//
//        if ($isDelete) {
//
//            session::put('msg', 'شما از دوره انصراف دادید.'); /* Change */
//            return redirect(route('user.courses'));
//
////            return redirect(route('user.courses',compact('registerCourse')));
//        } else {
//            session::put('msg', 'شما از دوره انصراف ندادید.'); /* Change */
//
//            return redirect(route('user.courses'));
//        }
//
//  }


}
