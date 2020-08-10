<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\Poster;
use App\Tizer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TizerController extends Controller
{
    public function showTizer(Request $request)
    {

        $tizer=Tizer::latest()->orderBy('id','DESC')->limit(1)->get();
        $poster=Poster::latest()->orderBy('id','DESC')->limit(1)->get();
        return view('Panel.Admin-Panel.home-view.tizer',compact('tizer','poster'));
    }



         public function update(Request $request,Tizer $tizer)
  {
      $this->validate($request, [
          'name' => 'required',
          'tizer' => 'required|mimes:mp4',



      ], [
          'name.required' => 'وارد کردن نام الزامی می باشد.',
          'tizer.required'=>'انتخاب ویدیو الزامی می باشد.',
          'tizer.mimes'=>'پسوند فایل باید از نوع mp4  باشد.',


      ]);
      if ($request->hasFile('tizer')) {
          $file = $request->file('tizer');
          $imageUrl = $this->UploadImage($file);
      } else {
          $imageUrl = $request->tizer;
      }

      $tizer->update(array_merge($request->all(), ['tizer' => $imageUrl]));
      session::put('msg', 'تیزر با موفقیت  بروز رسانی شد.');
      return redirect(route('tizer.show'));


    }

    public function delete(Tizer $tizer)
    {
        $isDeleted = $tizer->delete();
        if ($isDeleted) {
            session::put('msg', 'تیزر با موفقیت حذف شد.');

            return redirect(route('tizer.show'));
        } else {
            session::put('msg', 'تیزر با موفقیت حذف نشد.');

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
