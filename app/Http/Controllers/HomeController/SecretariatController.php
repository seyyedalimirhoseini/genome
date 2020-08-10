<?php

namespace App\Http\Controllers\HomeController;

use App\Secretariat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class SecretariatController extends Controller
{
    public function index()
    {

        return view('UI.Secretariat.secretariat');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'email' => 'required|email',
            'phone'=>'required|numeric|digits:11',
            'dabirkhane'=>'required',
            'description'=>'required',


        ], [
            'name.required' => 'وارد کردن نام و نام خانوادگی الزامی می باشد.',
            'title.required' => 'وارد کردن  عنوان الزامی می باشد.',
            'email.required' => 'وارد کردن ایمیل الزامی می باشد.',
            'phone.required' => 'وارد کردن تلفن همراه الزامی می باشد.',
            'phone.numeric' => 'شماره تلفن همراه باید عدد باشد.',
            'phone.digits' => 'شماره تلفن همراه باید 11 رقم باشد. ',
            'dabirkhane.required' => 'وارد کردن  نام دبیرخانه الزامی می باشد.',
            'description.required' => 'وارد کردن توضیحات الزامی می باشد.',

        ]);
      $data=  Secretariat::create($request->all());
        alert()->success('', 'با تشکر')->persistent('باشه');

        return redirect()->back();
    }
}
