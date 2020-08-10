<?php

namespace App\Http\Controllers\Auth;


use App\City;
use App\SendCode;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;


session_start();
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify';
//    public function redirectTo(){
//
//        // User role
//        $role = Auth::user()->role;
//
//        // Check user role
//        switch ($role) {
//            case 'admin':
//                return 'admin/panel';
//                break;
//            case 'user':
//                return '/user-panel';
//                break;
//            default:
//                return '/login';
//                break;
//        }
//    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user =$this->create($request->all())));
        return $this->registered($request ,$user) ?:redirect('/verify?phone='.$request->phone);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
//
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name'=>'required|regex:/^[a-zA-Z,آ ا ب پ ت ث ج چ ح خ د ذ ر ز ژ س ش ص ض ط ظ ع غ ف ق ک گ ل م ن و ه ی]+$/',
            'lastname'=>'required|regex:/^[a-zA-Z,آ ا ب پ ت ث ج چ ح خ د ذ ر ز ژ س ش ص ض ط ظ ع غ ف ق ک گ ل م ن و ه ی]+$/',
            'nationalcode'=>'required|numeric|digits:10',
            'email'=>'required|unique:users,email',
//            'field'=>'required',
//            'degree'=>'required',
            'city'=>'required',
            'state'=>'required',
//            'address'=>'required',
            'phone'=>'required|numeric|digits:11',
            'password' => 'required|min:8',
            'image' => 'image|mimes:jpeg,png,bmp',
            'password_confirmation' => 'required:password|same:password|min:8',

        ],[
            'name.required' =>'وارد کردن نام الزامی است.',
            'name.regex'=>'نام باید حرف باشد',

            'lastname.required'=>'وارد کردن نام خانوادگی الزامی می باشد.',
            'lastname.regex'=>'نام خانوادگی باید حرف باشد',
            'nationalcode.required'=>'وارد کردن کد ملی الزامی می باشد.',
            'nationalcode.numeric'=>'کد ملی باید عدد باشد.',
            'nationalcode.digits'=>'کد ملی باید 10 رقم باشد.',
            'email.required'=>'وارد کردن ایمیل الزامی می باشد.',
            'email.unique'=>'این ایمیل قبلا رزرو شده است.',
//            'field.required'=>'وارد کردن رشته تحصیلی الزامی می باشد.',
//            'degree.required'=>'وارد کردن مدرک تحصیلی الزامی می باشد.',
            'city.required'=>'وارد کردن شهرستان الزامی می باشد.',
            'state.required'=>'وارد کردن استان الزامی می باشد.',
//            'address.required'=>'وارد کردن آدرس الزامی می باشد.',
            'phone.required'=>'وارد کردن شماره تلفن همراه الزامی می باشد.',
            'phone.numeric'=>'شماره تلفن همراه باید عدد باشد.',
            'phone.digits'=>'شماره تلفن همراه  باید 11 رقم باشد',
            'password.required'=>'وارد کردن رمز عبور الزامی می باشد.',
            'password.min'=>'کلمه عبور حداقل 8 کاراکتر نیاز  دارد.',
//            'password.max'=>'کلمه عبور حداکثر باید 12 کاراکتر باشد.',
            'password_confirmation.required'=>'وارد کردن تکرار رمز عبور الزامی می باشد.',
            'password_confirmation.min'=>'تکرار کلمه عبور حداقل 8 کاراکتر نیاز دارد.',
//            'password_confirmation.max'=>'تکرار کلمه عبور حداقل 12 کاراکتر نیاز دارد.',
            'password_confirmation.same'=>'تکرار رمز عبور نادرست می باشد.',
            'image.mimes'=>'پسوند فایل باید از نوع jpegیا pngیاbmp  باشد.',
//            'image.required'=>'انتخاب تصویر الزامی است.',
            'image.image'=>'فایل انتخاب  شده  باید عکس باشد.',
        ]);

//                $this->validate( $request, [
//            'name'=>'required',
//            'lastname'=>'required',
//            'nationalcode'=>'required',
//            'email'=>'required',
//            'field'=>'required',
//            'degree'=>'required',
//            'city'=>'required',
//            'state'=>'required',
//            'address'=>'required',
//            'phone'=>'required|max:12',
//            'password' => 'required|min:8|max:12',
//
//            'password_confirmation' => 'required:password|same:password|min:6|max:12',
//
//
//
//        ], [
//            'name.required'=>'وارد کردن نام الزامی می باشد.',
//            'lastname.required'=>'وارد کردن نام خانوادگی الزامی می باشد.',
//            'nationalcode.required'=>'وارد کردن کد ملی الزامی می باشد.',
//            'email.required'=>'وارد کردن ایمیل الزامی می باشد.',
//            'field.required'=>'وارد کردن رشته تحصیلی الزامی می باشد.',
//            'degree.required'=>'وارد کردن مدرک تحصیلی الزامی می باشد.',
//            'city.required'=>'وارد کردن شهرستان الزامی می باشد.',
//            'state.required'=>'وارد کردن استان الزامی می باشد.',
//            'address.required'=>'وارد کردن آدرس الزامی می باشد.',
//            'phone.required'=>'وارد کردن شماره تلفن همراه الزامی می باشد.',
//            'password.required'=>'وارد کردن رمز عبور الزامی می باشد.',
//            ' password_confirmation.required'=>'رمز عبور برابر نمی باشد.',
//
//        ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $request = request();
//
//        $profileImage = $request->file('image');
//        $profileImageSaveAsName = time() . Auth::id() . "-profile." .
//            $profileImage->getClientOriginalExtension();
//
//        $upload_path = 'images/';
//        $profile_image_url = $upload_path . $profileImageSaveAsName;
//        $success = $profileImage->move($upload_path, $profileImageSaveAsName);
//
        $fileName = null;
        if ($request->has('image'))
        {
            if (Input::file('image')->isValid()) {
                if (Input::file('image')) {
                    $destinationPath = public_path('/images');
                    $extension = Input::file('image')->getClientOriginalExtension();
                    $fileName = uniqid() . '.' . $extension;

                    Input::file('image')->move($destinationPath, $fileName);
                }
            }else
            {
                $fileName=$request->image;
//               $image->save();
            }
        }

        $user= User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'nationalcode' => $data['nationalcode'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'field'=>$data['field'],
            'degree'=>$data['degree'],
            'address'=>$data['address'],
//            'image' => $profile_image_url,
            'image' =>  $fileName,
            'state_id'=>$data['state'],
            'city_id'=>$data['city'],

            'password' => Hash::make($data['password']),
            'active'=>0,


        ]);
        if ($user)
        {
            $user->code=SendCode::sendCode($user->phone);
            $user->save();
        }

    }


}
