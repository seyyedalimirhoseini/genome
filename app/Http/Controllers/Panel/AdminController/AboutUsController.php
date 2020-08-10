<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AboutUsController extends Controller
{
    public function index()
    {
            $about=AboutUs::all();

            return view('Panel.Admin-Panel.AboutUs.aboutus',compact('about'));
    }
    public function update(Request $request, AboutUs $aboutUs)
    {
        $this->validate($request, [
            'name'=>'required',
            'text'=>'required',
        ],[
            'name.required' =>'وارد کردن نام الزامی می باشد.',
            'text.required'=>'توضیحات درباره شرکت الزامی می باشد.'
        ]);
        $aboutUs->update($request->all());
        session::put('msg', 'درباره با ما با موفقیت  بروز رسانی شد.');
        return redirect(route('aboutus.show'));
    }
}
