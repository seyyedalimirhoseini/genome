<?php

namespace App\Http\Controllers\HomeController;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function index()
    {
        if (!Auth::check())
        {
            alert()->warning('!برای دانلود فایل ابتدا باید لاگین باشید', '')->persistent('باشه');


        }
        $files = File::latest()->paginate(5);
        return view('UI.EducationalFiles.files-show', compact('files'));
    }

    public function details($slug)
    {

        $file = File::where('slug', $slug)->first();
        if (!$file) {
            return abort(404);
        } else {
            return view('UI.EducationalFiles.file-page', compact('file'));

        }
    }

    public function download(File $file)
    {
        $hash = 'fds@#T@#56@sdgs131fasfq' . $file->id . \request()->ip() . \request('t');

        if(Hash::check($hash , \request('mac'))) {
            if (file_exists(storage_path('file/' . $file->file))) {

                return response()->download(storage_path('file/' . $file->file));
            }
                else{
                    alert()->error('فایل مورد نظر موجود نمی باشد!')->persistent('باشه');

                }

        }
        else {
            return 'لینک دانلود شما از کار افتاده است';
        }


    }

}
