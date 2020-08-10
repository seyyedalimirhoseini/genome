<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\Http\Controllers\Controller;
use App\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserIdeaController extends Controller
{
    public function index()
    {
        $ideas=Idea::latest()->where('status','=',3)->orWhere('status', '=', '0')->paginate(10);
        return view('Panel.Admin-Panel.user-ideas',compact('ideas'));
    }
    public function delete(Idea $idea)
    {
        if ($idea->status == 0) {
            $isDeleted = $idea->update(['status' => 2]);
            if ($isDeleted) {
                session::put('msg', 'ایده با موفقیت حذف شد.');
                return redirect(route('idea.show'));
            } else {
                session::put('msg', 'ایده کاربر با موفقیت حذف نشد.');
                return redirect(route('users.ideas'));
            }
        } else {
            $isDeleted = $idea->update(['status' => 1]);
            if ($isDeleted) {
                session::put('msg', 'ایده کاربر با موفقیت حذف شد.');
                return redirect(route('users.ideas'));
            } else {
                session::put('msg', 'ایده کاربر با موفقیت حذف نشد.');
                return redirect(route('idea.show'));
            }
        }
    }
}
