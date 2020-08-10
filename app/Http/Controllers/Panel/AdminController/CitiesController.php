<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\City;
use App\Http\Requests\CitiesRequest;
use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class CitiesController extends Controller
{
    public function index()
    {
        $cities=City::latest()->paginate(10);
        return view('Panel.Admin-Panel.cities.cities-show',compact('cities'));
    }
    public function create()
    {
        $states=State::all()->pluck('name','id');
        return view('Panel.Admin-Panel.cities.cities-create',compact('states'));
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'state_id'=>'required',

        ], [
            'name.required' => 'وارد کردن نام شهرستان الزامی می باشد.',
            'state_id.required'=>'وارد کردن نام استان الزامی می باشد.',

        ]);

        $city = DB::table('cities')->where('name',$request['name'])->get();
    if (count($city)>0)
    {
        session::put('msg', 'نام این  شهرستان قبلا اضافه  شده است.');
        return redirect()->route('cities.create');
    }else{
        $cities= City::create([
            'name'=>$request->input('name'),
            'state_id'=>$request->input('state_id'),
        ]);
        session::put('msg', 'شهرستان با موفقیت ذخیره شد.');
        return redirect(route('cities.show',compact('cities')));
    }




//           return redirect('admin/cities');



    }


    public function  edit(City $city)
    {
        $states= State::all()->pluck('name','id');
        return view('Panel.Admin-Panel.cities.cities-edit',compact('city','states'));
    }
    public function update(Request $request,City $city)
    {
        $this->validate($request, [
            'name' => 'required',
            'state_id'=>'required',

        ], [
            'name.required' => 'وارد کردن نام شهرستان الزامی می باشد.',
            'state_id.required'=>'وارد کردن نام استان الزامی می باشد.',

        ]);
        $city1 = DB::table('cities')->where('name',$request['name'])->get();
        if (count($city1)>0)
        {
            session::put('msg', 'نام این  شهرستان قبلا اضافه  شده است.');
            return redirect()->route('cities.show');
        }else
        {

            $city->update($request->all());
            session::put('msg', 'شهرستان با موفقیت  بروز رسانی شد.');
            return redirect(route('cities.show'));
        }

    }
    public function delete(City $city)
    {
        $isDeleted= $city->delete();
        if ($isDeleted) {
            session::put('msg', 'شهرستان با موفقیت حذف شد.');
            return redirect(route('cities.show'));
        }else{
            session::put('msg', 'شهرستان با موفقیت حذف نشد.');
            return redirect(route('cities.show'));
        }
    }
}
