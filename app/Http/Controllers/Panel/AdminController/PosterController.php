<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\Poster;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PosterController extends Controller
{
    public function update(Request $request,Poster $poster)
    {
        $this->validate($request, [
            'name' => 'required',
            'tizer' => 'required|image|mimes:jpeg,png,bmp',



        ], [
            'name.required' => 'وارد کردن نام الزامی می باشد.',
            'tizer.required'=>'انتخاب ویدیو الزامی می باشد.',
            'tizer.mimes'=>'پسوند فایل باید از نوع jpegیا pngیاbmp  باشد.',
                'tizer.image'=>'فایل انتخاب شده باید عکس باشد',

        ]);
        if ($request->hasFile('tizer')) {
            $file = $request->file('tizer');
            $imageUrl = $this->UploadImage($file);
        } else {
            $imageUrl = $request->tizer;
        }

        $poster->update(array_merge($request->all(), ['tizer' => $imageUrl]));
        session::put('msg', 'پوستر با موفقیت  بروز رسانی شد.');
        return redirect(route('tizer.show'));


    }
    public function delete(Poster $poster)
    {
        $isDeleted = $poster->delete();
        if ($isDeleted) {
            session::put('msg', 'پوستر با موفقیت حذف شد.');

            return redirect(route('tizer.show'));
        } else {
            session::put('msg', 'پوستر با موفقیت حذف نشد.');

            return redirect(route('tizer.show'));
        }
    }
    private function UploadImage($file)
    {
        $file_name=time().'.'.$file->getClientOriginalName();
        $file->move(public_path('/video'),$file_name);
        return $file_name;
    }

}
