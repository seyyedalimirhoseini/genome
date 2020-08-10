<?php

namespace App\Http\Controllers\HomeController;

use App\AboutUs;
use App\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use UxWeb\SweetAlert\SweetAlert;

class AboutUsController extends Controller
{
    public function index()
    {
        $AboutUs=AboutUs::all();
        return view('UI.AboutUs.aboutus',compact('AboutUs'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'email' => 'required|email',
            'phone'=>'required|numeric|digits:11',

            'description'=>'required',


        ], [
            'name.required' => 'وارد کردن نام و نام خانوادگی الزامی می باشد.',
            'title.required' => 'وارد کردن  عنوان الزامی می باشد.',
            'email.required' => 'وارد کردن ایمیل الزامی می باشد.',
            'phone.required' => 'وارد کردن تلفن همراه الزامی می باشد.',
            'phone.numeric' => 'شماره تلفن همراه باید عدد باشد.',
            'phone.digits' => 'شماره تلفن همراه باید 11 رقم باشد. ',

            'description.required' => 'وارد کردن توضیحات الزامی می باشد.',

        ]);
        $data =ContactUs::create($request->all());
        alert()->success('', 'با تشکر')->persistent('باشه');

//        return Redirect::to('/aboutus');
        return redirect()->back();

    }
}
