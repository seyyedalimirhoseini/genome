<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeViewController extends Controller
{
    // Show Sliders
    public function showSliders()
    {
        return view('Panel.Admin-Panel.home-view.show-sliders');
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        $this->validate($request, [

            'image'=>'required'

        ], [
            'image.required' => 'انتخاب تصویر اسلایدر الزامی می باشد.',
        ]);
        $file=$request->file('image');
        $imageUrl=$this->UploadImage($file);
       $sliders= Slider::create(array_merge($request->all(),[$imageUrl=>'imageUrl']));
        session::put('msg', 'اسلایدر با موفقیت ذخیره شد.');

        return redirect(route('sliders.show',compact('sliders')));
    }


    public function edit(Slider $slider)
    {
        return view('Panel.Admin-Panel.cores.course-edit',compact('slider'));

    }
    public function update(Request $request,Slider $slider)
    {
        $this->validate($request, [

            'image'=>'required'

        ], [
            'image.required' => 'انتخاب تصویر اسلایدر الزامی می باشد.',
        ]);
        if ($request->hasFile('image'))
        {
            $file=$request->has('image');
            $imageUrl=$this->UploadImage($file);
        }else{
            $imageUrl=$request->image;
        }
        $slider->update(array_merge($request->all(),[$imageUrl=>'imageUrl']));
        session::put('msg', 'اسلایدر با موفقیت بروزرسانی شد.');

        return redirect(route('sliders
        .show'));
    }
    public function delete(Slider $slider)
    {
        $isDeleted=$slider->delete();
        if ($isDeleted)
        {
            session::put('msg', 'اسلایدر با موفقیت خذف شد.');

            return redirect(route('sliders.show'));        }
        else{
            session::put('msg', 'اسلایدر با موفقیت خذف نشد.');

            return redirect(route('sliders.show'));        }

    }
    private function UploadImage($file)
    {
        $file_name=time().'.'.$file->getClientOriginalName();
        $file->move(public_path('/images'),$file_name);
        return $file_name;
    }

//    // Show Cores Sliders
//    public function showCoresSliders()
//    {
//        return view('Panel.Admin-Panel.HomeView.show-cores-sliders');
//    }
//
//    // Show Organizers Sliders
//    public function showOrganizersSliders()
//    {
//        return view('Panel.Admin-Panel.HomeView.show-organizers-sliders');
//    }
//
//    // Show Committee Sliders
//    public function showCommitteeSliders()
//    {
//        return view('Panel.Admin-Panel.HomeView.show-committee-sliders');
//    }

}
