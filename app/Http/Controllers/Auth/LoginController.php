<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\SendCode;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Ipecompany\Smsirlaravel\Smsirlaravel;
use Trez\RayganSms\Facades\RayganSms;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';
    public function redirectTo(){

        // User role
        $role = Auth::user()->role;

        // Check user role
        switch ($role) {
            case 'admin':
                return 'admin/panel';
                break;
            case 'user':
                return '/user/panel';
                break;
            default:
                return '/login';
                break;
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $this->validateLogin($request);
        if($this->hasTooManyLoginAttempts($request)){
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        //------------------------------------------
        if ($this->guard()->validate($this->credentials($request))){
            $user=$this->guard()->getLastAttempted();
            if ($user->active && $this->attemptLogin($request)){
                return $this->sendLoginResponse($request);
            }else{
                $this->incrementLoginAttempts($request);
//                $user->code=RayganSms::sendAuthCode('کد احراز هویت شما'.$user->phone,false);
                $user->code=SendCode::sendCode($user->phone);
                if ($user->save()){
                    return redirect('/verify?phone='.$user->phone);
                }
            }
        }
        //------------------------------------------
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function reauthenticated(User $user)
    {


        // $request->session()->put('verify:request_id', $verification->getRequestId());
        $code=rand(1111,9999);
        DB::table('users')->where('id','=',$user->id)->update(['code'=>$code]);

//             Smsirlaravel::sendVerification($code,'+98'.(int)$user->phone);
//        echo  RayganSms::sendAuthCode('+98'.(int)$user->phone, $code, false);
        Smsirlaravel::sendVerification($code,'+98'.(int)$user->phone);
        return redirect('verify');

    }
}
