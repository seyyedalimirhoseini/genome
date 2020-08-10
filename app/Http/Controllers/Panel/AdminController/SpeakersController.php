<?php

namespace App\Http\Controllers\Panel\AdminController;


use App\Speaker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SpeakersController extends Controller
{
    // Show Sliders


//    // Show Cores Sliders
    public function showSpeakersSliders()
    {
        $speakers=Speaker::latest()->paginate(5);
        return view('Panel.Admin-Panel.home-view.show-speakers-sliders',compact('speakers'));
}


    public function store(Request $request)
    {
        $this->validate($request, [

            'text'=>'max:180',
            'image' => 'required|mimes:jpeg,png,bmp',

        ], [
            'image.required' => 'انتخاب تصویر اسلایدر الزامی می باشد.',
            'image.mimes'=>'پسوند فایل باید از نوع jpegیا pngیاbmp  باشد.',


            'text.max'=>'متن اسلایدر باید حداکثر 180 کاراکتر باشد.',
        ]);
        $file=$request->file('image');
        $imageUrl=$this->UploadImage($file);
        $speakers=Speaker::create(array_merge($request->all(),['image'=>$imageUrl]));
        session::put('msg','اسلایدر با موفقیت  ذخیره شد.');
        return redirect(route('speakers.show',compact('speakers')));

    }

    public function update(Request $request, Speaker $speaker)
    {
        $this->validate($request, [

            'text'=>'max:180',
            'image' => 'required|mimes:jpeg,png,bmp',

        ], [
            'image.required' => 'انتخاب تصویر اسلایدر الزامی می باشد.',
            'image.mimes'=>'پسوند فایل باید از نوع jpegیا pngیاbmp  باشد.',


            'text.max'=>'متن اسلایدر باید حداکثر 180 کاراکتر باشد.',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageUrl = $this->UploadImage($file);
        } else {
            $imageUrl = $request->image;
        }

        $speaker->update(array_merge($request->all(), ['image' => $imageUrl]));
        session::put('msg', 'اسلایدر با موفقیت  بروز رسانی شد.');


        return redirect(route('speakers.show'));
    }
    public function delete(Speaker $speaker)
    {
        $isDeleted=$speaker->delete();
        if ($isDeleted)
        {
            session::put('msg', 'اسلایدر با موفقیت  حذف شد.');

            return redirect(route('speakers.show'));
        }
        else{
            session::put('msg', 'اسلایدر با موفقیت  حذف نشد.');

            return redirect(route('speakers.show'));
        }

    }
    private function UploadImage($file)
    {
        $file_name=time().'.'.$file->getClientOriginalName();
        $file->move(public_path('/images'),$file_name);
        return $file_name;
    }

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
