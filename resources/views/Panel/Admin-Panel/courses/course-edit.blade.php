@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | ویرایش دوره
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>ویرایش دوره :</h4>
            </div>
            <div class="container">
                <form class="form" action="{{Route('courses.update',['id'=>$course->id])}}" method="post">
                    {{csrf_field()}}
                    <div class="input-div">
                        <div class="row">
                            <div class="col-md-6 @if ($errors->has('title')) has-error @endif">
                                <label for="title"><i class="fa fa-asterisk"></i>عنوان دوره :</label>
                                <input type="text"  name="title" id="title" placeholder="عنوان دوره را وارد کنید..." value="{{$course->title}}">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('title') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('points')) has-error @endif">
                                <label for="points"><i class="fa fa-asterisk"></i>امتیاز دوره :</label>
                                <input type="text"  name="points" id="points" placeholder="امتیاز دوره را وارد کنید..." value="{{$course->points}}" >
                                @if ($errors->has('points'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('points') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('date')) has-error @endif">
                                <label for="date"><i class="fa fa-asterisk"></i>تاریخ برگزاری :</label>
                                <input type="text" name="date" id="date" class="observer-example" placeholder="تاریخ برگزاری دوره را وارد کنید..." {{$course->date}}>
                                @if ($errors->has('date'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('date') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('clock')) has-error @endif">
                                <label for="clock"><i class="fa fa-asterisk"></i>ساعت برگزاری :</label>
                                <input type="text" name="clock"   id="clock" data-align="top" data-autoclose="true" class="clockpicker" placeholder="ساعت برگزاری دوره را وارد کنید..." value=" {{$course->clock}}">
                                @if ($errors->has('clock'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('clock') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('price')) has-error @endif">
                                <label for="clock"><i class="fa fa-asterisk"></i>قیمت :</label>
                                <input type="text" name="price"   id="price" placeholder="قیمت دوره را وارد کنید..." value=" {{$course->price}}">
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('price') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 confirm-btn">
                                <button type="submit" class="login-btn">بروزرسانی دوره</button>
                                <a class="cancel-btn" href="{{Route('courses.show')}}">انصراف</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
