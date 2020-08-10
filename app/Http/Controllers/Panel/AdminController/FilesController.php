<?php
namespace App\Http\Controllers\Panel\AdminController;

use App\File;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FilesController extends Controller
{

public function index()
{
    $files=File::latest()->paginate(5);
    return view('Panel.Admin-Panel.EducationalFiles.files-show',compact('files'));

}
public function create()
{
    return view('Panel.Admin-Panel.EducationalFiles.file-add');

}
public function edit(File $file)
{
    return view('Panel.Admin-Panel.EducationalFiles.file-edit',compact('file'));

}
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,bmp',
            'body' => 'required|max:200',
//            'file'=>'required|mimes:pdf',


        ], [
            'name.required' => 'وارد کردن عنوان فایل الزامی می باشد.',
//           'image.required'=>'انتخاب تصویر فایل الزامی می باشد.',
            'image.mimes'=>'پسوند فایل باید از نوع jpegیا pngیاbmp  باشد.',
            'image.image'=>'فایل انتخاب شده باید تصویر باشد.',
//            'file.required'=>'انتخاب فایل الزامی می باشد.',
                'file.mimes'=>'پسوند فایل pdf باشد.',
            'body.required'=>'وارد کردن متن فایل الزامی می باشد.',
            'body.max'=>'متن حداکثر باید 200 کاراکتر باشد.'

        ]);

        $image = $request->file('image');
        if ($request->has('image'))
        {
            if ($request->hasFile('image')) {
                $imageUrl = $this->uploadImage($image);
            }
        }else
        {
            $imageUrl=$request->image;
        }

        $file1 = $request->file('file');
        if ($request->hasFile('file')) {
            $sourceUrl = $this->uploadSource($file1);
        }else
        {
            $sourceUrl=$request->file;
        }

         File::create(array_merge($request->all(), ['image' => $imageUrl], ['file' => $sourceUrl]));
        session::put('msg','فایل با موفقیت ذخیره شد.');
        return redirect('admin/file');
    }
    public function update(Request $request,File $file)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,bmp',
            'body' => 'required|max:200',
            'file'=>'mimes:pdf',


        ], [
            'name.required' => 'وارد کردن عنوان فایل الزامی می باشد.',
//            'image.required'=>'انتخاب تصویر فایل الزامی می باشد.',
            'image.mimes'=>'پسوند فایل باید از نوع jpegیا pngیاbmp  باشد.',
            'image.image'=>'فایل انتخاب شده باید تصویر باشد.',
//            'file.required'=>'انتخاب فایل الزامی می باشد.',
            'file.mimes'=>'پسوند فایل pdf باشد.',
            'body.required'=>'وارد کردن متن فایل الزامی می باشد.',
            'body.max'=>'متن حداکثر باید 200 کاراکتر باشد.'

        ]);
        $image = $request->file('image');
        if ($request->hasFile('image'))
        {
            $imageUrl = $this->uploadImage($image);
        }
        else {
            $imageUrl = $request->image;
        }
        $file1 = $request->file('file');
        if ($request->hasFile('file'))
        {
            $sourceUrl = $this->uploadSource($file1);
        }
        else {
            $sourceUrl = $request->file;
        }
        $file->update(array_merge($request->all(),['image' => $imageUrl],['file' => $sourceUrl]));
        session::put('msg','فایل با موفقیت بروزرسانی شد.');

        return redirect('admin/file');
    }
    public  function active(File $file)
    {

        $file->publication_status=1;
        $file->save();

        session::put('msg','نمایش فایل فعال شد ! ');
        return redirect(route('files.show'));
    }
    public  function  unactive(File $file)
    {

        $file->publication_status=0;
        $file->save();

        session::put('msg','نمایش فایل غیر فعال شد ! ');

        return redirect(route('files.show'));

    }

    public function delete(File $file)
    {
        $isDeleted=$file->delete();
        if ($isDeleted)
        {
            session::put('msg','فایل با موفقیت حذف شد.');
            return redirect(route('files.show'));
        }else
        {
            session::put('msg','فایل با موفقیت حذف نشد.');
            return redirect(route('files.show'));
        }
    }
    private function UploadImage($image)
    {
        $file_name=time().'.'.$image->getClientOriginalName();
        $image->move(public_path('/image'),$file_name);
        return $file_name;
    }
    private function uploadSource($file1)
    {


        $filename1 =  time().'.'.$file1->getClientOriginalName();
         $file1->move(storage_path('/file'),$filename1);
        return $filename1;
    }
}
