<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerifyController extends Controller
{
    public  function getVerify()
    {

        return view('verify');
    }
    public function postVerify(Request $request)
    {
        if ($user=User::where('code',$request->code)->first())
        {
            $user->active=1;
            $user->code=null;
            $user->save();
            session::put('msg', 'حساب کاربری شما فعال است.');

            return redirect(route('login'));
        }else{
            session::put('msg', 'کد فعال سازی اشتباه می باشد لطفا دوباره امتحان کنید.');

            return redirect(route('getVerify'));
        }
    }
}
