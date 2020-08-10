<?php

namespace App\Http\Controllers\Panel\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Support\Facades\Session;
use DB;
class NewsController extends Controller
{
    // Show Add News
    public function index()
    {
      $news=News::latest()->paginate(5);
      return view('Panel.Admin-Panel.news.news-show',compact('news'));
    }
   public function create()
   {
     return view('Panel.Admin-Panel.news.news-create');
   }
   public function store(Request $request)
   {
       $this->validate($request, [
           'title' => 'required',
           'image' => 'image|mimes:jpeg,png,bmp',
           'body' => 'required',



       ], [
           'title.required' => 'وارد کردن عنوان خبر الزامی می باشد.',
//           'image.required'=>'انتخاب تصویرخبر الزامی می باشد.',
           'image.mimes'=>'پسوند فایل باید از نوع jpegیا pngیاbmp  باشد.',
            'image.image'=>'فایل انتخاب شده باید تصویر باشد.',
           'body.required'=>'وارد کردن متن خبر الزامی می باشد.',

       ]);
       if ($request->hasFile('image')) {
           $file = $request->file('image');
           $imageUrl = $this->UploadImage($file);
       } else {
           $imageUrl = $request->image;
       }

       $news=News::create(array_merge($request->all(),['image'=>$imageUrl]));
       session::put('msg', 'خبر با موفقیت  ذخیره شد.');
       return redirect(route('news.show'));


   }
   public function  edit(News $news)
   {
       return view('Panel.Admin-Panel.news.news-edit',compact('news'));
   }
   public  function active(News $news)
   {

       $news->publication_status=1;
       $news->save();

         session::put('msg','نمایش خبر فعال شد ! ');
       return redirect(route('news.show'));
   }
   public  function  unactive(News $news)
   {

         $news->publication_status=0;
         $news->save();

        session::put('msg','نمایش خبرغیر فعال شد ! ');

       return redirect(route('news.show'));

   }
   public function update(Request $request,News $news)
   {
       $this->validate($request, [
           'title' => 'required',
           'image' => 'image|mimes:jpeg,png,bmp',
           'body' => 'required',



       ], [
           'title.required' => 'وارد کردن عنوان خبر الزامی می باشد.',
//           'image.required'=>'انتخاب تصویرخبر الزامی می باشد.',
           'image.mimes'=>'پسوند فایل باید از نوع jpegیا pngیاbmp  باشد.',
           'image.image'=>'فایل انتخاب شده باید تصویر باشد.',
           'body.required'=>'وارد کردن متن خبر الزامی می باشد.',

       ]);
       if ($request->hasFile('image')) {
           $file = $request->file('image');
           $imageUrl = $this->UploadImage($file);
       } else {
           $imageUrl = $request->image;
       }

       $news->update(array_merge($request->all(), ['image' => $imageUrl]));
       session::put('msg', 'خبر با موفقیت  بروز رسانی شد.');
       return redirect(route('news.show'));
   }
   public function delete(News $news)
   {
       $isDeleted= $news->delete();
       if ($isDeleted) {
           session::put('msg', 'خبر با موفقیت حذف شد.');
           return redirect(route('news.show'));
       }else{
           session::put('msg', 'خبر با موفقیت حذف نشد.');
           return redirect(route('news.show'));
       }
   }
  private function UploadImage($file)
  {
    $file_name=time().'.'.$file->getClientOriginalName();
    $file->move(public_path('/image'),$file_name);
    return $file_name;
  }
}
