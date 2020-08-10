<?php

namespace App\Http\Controllers\Panel\AdminController;

use App\Field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FieldsController extends Controller
{
  public function index()
  {
      $fields=Field::latest()->paginate(10);
      return view('Panel.Admin-Panel.fields.fields-show',compact('fields'));
  }
  public function create()
  {
      return view('Panel.Admin-Panel.fields.fields-create');
  }
  public function store(Request $request)
  {
      $this->validate($request, [
          'name' => 'required',



      ], [
          'name.required' => 'وارد کردن نام رشته تحصیلی الزامی می باشد.',


      ]);
      $fields=Field::create($request->all());
      session::put('msg', 'رشته تحصیلی با موفقیت ذخیره شد.');

      return redirect(route('fields.show',compact('fields')));
  }
  public function edit(Field $field)
  {
      return view('Panel.Admin-Panel.fields.fields-edit',compact('field'));
  }
  public function update(Request $request,Field $field)
  {
      $this->validate($request, [
          'name' => 'required',



      ], [
          'name.required' => 'وارد کردن نام رشته تحصیلی الزامی می باشد.',


      ]);
      $field->update($request->all());
      session::put('msg', 'رشته تحصیلی با موفقیت  بروز رسانی شد.');
      return redirect(route('fields.show'));
  }
  public function delete(Field $field)
  {
      $isDeleted= $field->delete();
      if ($isDeleted) {
          session::put('msg', 'رشته تحصیلی با موفقیت حذف شد.');
          return redirect(route('fields.show'));
      }else{
          session::put('msg', 'رشته تحصیلی با موفقیت حذف نشد.');
          return redirect(route('fields.show'));
      }
  }
}
