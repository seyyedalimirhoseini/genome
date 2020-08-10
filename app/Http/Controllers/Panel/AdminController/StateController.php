<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\Http\Controllers\Controller;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StateController extends Controller
{
    public function  index()
    {
        $states=State::latest()->paginate(10);
        return view('Panel.Admin-Panel.states.states-show',compact('states'));
    }
    public function create()
    {
        return view('Panel.Admin-Panel.states.states-create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',



        ], [
            'name.required' => 'وارد کردن نام استان الزامی می باشد.',


        ]);
        $state = DB::table('states')->where('name',$request['name'])->get();
        if (count($state)>0)
        {
            session::put('msg', 'نام این  استان قبلا اضافه  شده است.');
            return redirect()->route('states.create');

        }else
        {
            $states=State::create($request->all());

            session::put('msg', 'استان با موفقیت ذخیره شد.');

            return redirect(route('states.show',compact('states')));
        }

    }
    public function  edit(State $state)
    {

        return view('Panel.Admin-Panel.states.states-edit',compact('state'));
    }
    public function update(Request $request,State $state)
    {
        $this->validate($request, [
            'name' => 'required',



        ], [
            'name.required' => 'وارد کردن نام استان الزامی می باشد.',


        ]);
        $state1 = DB::table('states')->where('name',$request['name'])->get();
        if (count($state1)>0)
        {
            session::put('msg', 'نام این  استان قبلا اضافه  شده است.');
            return redirect()->route('states.show');

        }else
        {
            $state->update($request->all());
            session::put('msg', 'استان با موفقیت  بروز رسانی شد.');
            return redirect(route('states.show'));
        }

    }
    public function delete(State $state)
    {
        $isDeleted= $state->delete();
        if ($isDeleted) {
            session::put('msg', 'استان با موفقیت حذف شد.');
            return redirect(route('states.show'));
        }else{
            session::put('msg', 'استان با موفقیت حذف نشد.');
            return redirect(route('states.show'));
        }
    }
}
