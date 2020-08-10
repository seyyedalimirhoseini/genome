<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\Event;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class EventsController extends Controller
{
    // Show Sliders


//    // Show Cores Sliders
    public function showEventsSliders()
    {
        $events=Event::latest()->paginate(5);
        return view('Panel.Admin-Panel.home-view.show-event-sliders',compact('events'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [

            'text'=>'max:500',
            'image' => 'required|mimes:jpeg,png,bmp',

        ], [
            'image.required' => 'انتخاب تصویر اسلایدر الزامی می باشد.',
            'image.mimes'=>'پسوند فایل باید از نوع jpegیا pngیاbmp  باشد.',


            'text.max'=>'متن اسلایدر باید حداکثر 500 کاراکتر باشد.',
        ]);
        $file=$request->file('image');
        $imageUrl=$this->UploadImage($file);
        $events=Event::create(array_merge($request->all(),['image'=>$imageUrl]));
        session::put('msg','اسلایدر با موفقیت ذخیره شد.');
        return redirect(route('events.show',compact('events')));

    }

    public function update(Request $request, Event $event)
    {
        $this->validate($request, [

            'text'=>'max:500',
            'image' => 'required|mimes:jpeg,png,bmp',

        ], [
            'image.required' => 'انتخاب تصویر اسلایدر الزامی می باشد.',
            'image.mimes'=>'پسوند فایل باید از نوع jpegیا pngیاbmp  باشد.',


            'text.max'=>'متن اسلایدر باید حداکثر 500 کاراکتر باشد.',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageUrl = $this->UploadImage($file);
        } else {
            $imageUrl = $request->image;
        }

        $event->update(array_merge($request->all(), ['image' => $imageUrl]));
        session::put('msg', 'اسلایدر با موفقیت بروزرسانی شد.');
        return redirect(route('events.show'));
    }
    public function delete(Event $event)
    {
        $isDeleted=$event->delete();
        if ($isDeleted)
        {
            session::put('msg', 'اسلایدر با موفقیت حذف شد.');

            return redirect(route('events.show'));
        }
        else{
            session::put('msg', 'اسلایدر با موفقیت حذف نشد.');

            return redirect(route('events.show'));
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
