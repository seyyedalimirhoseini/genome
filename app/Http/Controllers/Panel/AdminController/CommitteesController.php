<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\Committee;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CommitteesController extends Controller
{
    // Show Sliders


//    // Show Cores Sliders
    public function showCommitteeSliders()
    {
        $committees=Committee::latest()->paginate(4);
        return view('Panel.Admin-Panel.home-view.show-committee-sliders',compact('committees'));
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
        $committees=Committee::create(array_merge($request->all(),['image'=>$imageUrl]));
        session::put('msg', 'اسلایدر با موفقیت ذخیره شد.');

        return redirect(route('committees.show',compact('committees')));

    }

    public function update(Request $request,Committee $committee)
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

        $committee->update(array_merge($request->all(), ['image' => $imageUrl]));
        session::put('msg', 'اسلایدر با موفقیت  بروز رسانی شد.');
        return redirect(route('committees.show'));
    }
    public function delete(Committee $committee)
    {
        $isDeleted=$committee->delete();
        if ($isDeleted)
        {
            session::put('msg', 'تصویر با موفقیت حذف شد.');

            return redirect(route('committees.show'));
        }
        else{
            session::put('msg', 'تصویر با موفقیت حذف نشد.');

            return redirect(route('committees.show'));
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
