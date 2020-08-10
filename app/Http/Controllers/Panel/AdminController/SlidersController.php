<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SlidersController extends Controller
{
    // Show Sliders
    public function showSliders()
    {
        $sliders=Slider::latest()->paginate(5);
        return view('Panel.Admin-Panel.home-view.show-sliders',compact('sliders'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'text'=>'max:200',
            'image' => 'required|mimes:jpeg,png,bmp',

        ], [
            'image.required' => 'انتخاب تصویر اسلایدر الزامی می باشد.',
            'image.mimes'=>'پسوند فایل باید از نوع jpegیا pngیاbmp  باشد.',


            'text.max'=>'متن اسلایدر باید حداکثر 200 کاراکتر باشد.',
        ]);
        $file=$request->file('image');
        $imageUrl=$this->UploadImage($file);
        $sliders= Slider::create(array_merge($request->all(),['image'=>$imageUrl]));
        session::put('msg', 'اسلایدر با موفقیت ذخیره شد.');

        return redirect(route('sliders.show',compact('sliders')));
    }



    public function update(Request $request,Slider $slider)
    {
        $this->validate($request, [

            'text'=>'max:200',
            'image' => 'required|mimes:jpeg,png,bmp',

        ], [
            'image.required' => 'انتخاب تصویر اسلایدر الزامی می باشد.',
            'image.mimes'=>'پسوند فایل باید از نوع jpegیا pngیاbmp  باشد.',


            'text.max'=>'متن اسلایدر باید حداکثر 200 کاراکتر باشد.',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageUrl = $this->UploadImage($file);
        } else {
            $imageUrl = $request->image;
        }

        $slider->update(array_merge($request->all(), ['image' => $imageUrl]));
        session::put('msg', 'اسلایدر با موفقیت  بروز رسانی شد.');
        return redirect(route('sliders.show'));
    }
    public function delete(Slider $slider)
    {
        $isDeleted=$slider->delete();
        if ($isDeleted)
        {
            session::put('msg', 'اسلایدر با موفقیت حذف شد.');

            return redirect(route('sliders.show'));        }
        else{
            session::put('msg', 'اسلایدر با موفقیت حذف نشد.');

            return redirect(route('sliders.show'));        }

    }
    private function UploadImage($file)
    {
        $file_name=time().'.'.$file->getClientOriginalName();
        $file->move(public_path('/images'),$file_name);
        return $file_name;
    }




}
