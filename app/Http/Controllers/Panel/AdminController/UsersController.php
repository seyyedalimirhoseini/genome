<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    // Show Users List
    public function index()
    {

        $users = User::where('role','user')->latest()->paginate(10);
        return view('Panel.Admin-Panel.users-list',compact('users'));
    }

    // Show User Details
    public function showUserDetails(User $user)
    {
        return view('Panel.Admin-Panel.user-details',compact('user'));
    }

    // Show Users Ideas

    public function delete(User $user)
    {
        $isDeleted= $user->delete();
        if ($isDeleted) {
            session::put('msg', 'کاربر با موفقیت حذف شد.');
            return redirect(route('users.list'));
        }else{
            session::put('msg', 'کاربر با موفقیت حذف نشد.');
            return redirect(route('users.list'));
        }
    }
}
