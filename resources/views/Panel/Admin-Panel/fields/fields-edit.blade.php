@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | ویرایش رشته تحصیلی
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>ویرایش رشته تحصیلی :</h4>
            </div>
            <div class="container">
                <form class="form" action="{{Route('fields.update',['id'=>$field->id])}}" method="post">
                    {{csrf_field()}}
                    <div class="input-div">
                        <div class="row">
                            <div class="col-md-6 @if ($errors->has('name')) has-error @endif">
                                <label for="name"><i class="fa fa-asterisk"></i>نام رشته تحصیلی :</label>
                                <input type="text" name="name" id="name"  value="{{$field->name}}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('name') }}</small>
                                     </span>
                                @endif
                            </div>



                            <div class="col-md-7 confirm-btn"> <!-- Change -->
                                <button type="submit" class="edit-btn">بروز رسانی رشته تحصیلی</button>
                                <a class="cancel-btn" href="{{Route('fields.show')}}">انصراف</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection