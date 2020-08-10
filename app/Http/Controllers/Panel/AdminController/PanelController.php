<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class PanelController extends Controller
{
    // Show Admin Panel
    public function index()
    {

            return view('Panel.Admin-Panel.admin-details');


    }
public function edit()
{
    $states = DB::table("states")->pluck("name","id");
    $user=User::find(Auth::user()->id);

    return view('Panel.Admin-Panel.admin-edit',compact('user','states'));
}
    public function myformAjax($id)
    {
//        $cities = DB::table("cities")->where("state_id",$id)->lists("name","id");
        $cities = DB::table("cities")->where("state_id",$id)->pluck("name","id");

        return json_encode($cities);
    }
    public function update(Request $request,$user)
    {
        $this->validate($request, [
            'name'=>'required|regex:/^[a-zA-Z,آ ا ب پ ت ث ج چ ح خ د ذ ر ز ژ س ش ص ض ط ظ ع غ ف ق ک گ ل م ن و ه ی]+$/',
            'lastname'=>'required|regex:/^[a-zA-Z,آ ا ب پ ت ث ج چ ح خ د ذ ر ز ژ س ش ص ض ط ظ ع غ ف ق ک گ ل م ن و ه ی]+$/',
            'nationalcode'=>'required|numeric|digits:10',
            'email'=>'required|unique:users,email,'. auth()->user()->id . ',id',
//            'field'=>'required',
//            'degree'=>'required',
            'city'=>'required',
            'state'=>'required',
//            'address'=>'required',
            'phone'=>'required|numeric|digits:11',
            'password' => 'required|min:8|max:12',
            'image' => 'image|mimes:jpeg,png,bmp',
            'password_confirmation' => 'required:password|same:password|min:6|max:12',

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
            'image.image'=>'فایل انتخاب  شده باید عکس باشد.'
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['lastname'] = $request->lastname;
        $data['nationalcode'] = $request->nationalcode;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['field'] = $request->field;
        $data['degree'] = $request->degree;
        $data['state_id'] = $request->state;
        $data['city_id'] = $request->city;
        $data['address'] = $request->address;
       $data[ 'password'] = Hash::make($request->password);
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
//                $image->save();
            }
        }
        $data['image']=$fileName;

//        $image = $request->file('image');
//        $new_file_name = time() . '.' . $image->getClientOriginalExtension();
//       $isUploaded=$image->move(public_path('images/'), $new_file_name);
//
//        if ($isUploaded)
//        {
//            $data['image']=$new_file_name;
//        }else{
//            $data['image']=null;
//        }
        $isUpdated = DB::table('users')
            ->where('id',$user)
            ->update($data);
        if ($isUpdated) {
            session::put('msg','اطلاعات با موفقیت بروزرسانی شد.');
//            return view('Panel.Admin-Panel.admin-details');
            return Redirect::to('admin/panel');
        }else
        {
            session::put('msg','اطلاعات با موفقیت بروزرسانی نشد.');
//            return view('Panel.Admin-Panel.admin-details');
            return Redirect::to('admin/panel');
        }

    }




    // Show Admin Edit
//    public function showAdminEdit()
//    {
//        return view('Panel.Admin-Panel.admin-edit');
//    }

}
