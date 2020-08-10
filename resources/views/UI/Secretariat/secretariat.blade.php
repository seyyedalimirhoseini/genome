@extends('UI.master')

@section('title')
    دبیرخانه
@endsection

@section('css')
    <link rel="stylesheet" href="{{URL('css/Panel/user-details.css')}}">
    <link rel="stylesheet" href="{{URL('css/Panel/box.css')}}">
@endsection

@section('content')
    <div class="container news-container">
        <div class="user-details">
            <div class="page-title">
                <h4>دبیرخانه :</h4>
            </div>
            <div class="container">
                <form class="form margin-top-0" action="{{Route('home.secretariat.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="input-div">
                        <div class="row">
                            <div class="col-md-6 @if ($errors->has('name')) has-error @endif">
                                <label for="name"><i class="fa fa-asterisk"></i>نام و نام خانوادگی :</label>
                                <input type="text" name="name" placeholder="نام و نام خانوادگی خود را وارد کنید..." value="{{old('name')}}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('name') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('title')) has-error @endif">
                                <label for="title"><i class="fa fa-asterisk"></i>عنوان پیام :</label>
                                <input type="text" name="title" placeholder="عنوان پیام خود را وارد کنید..." value="{{old('title')}}">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('title') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('email')) has-error @endif">
                                <label for="email"><i class="fa fa-asterisk"></i>ایمیل :</label>
                                <input type="email" name="email" placeholder="ایمیل خود را وارد کنید..." value="{{old('email')}}" >
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('email') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('phone')) has-error @endif">
                                <label for="phone"><i class="fa fa-asterisk"></i>شماره تماس :</label>
                                <input type="text" name="phone" placeholder="شماره تماس خود را وارد کنید..." value=" {{old('phone')}}" >
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('phone') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6  @if ($errors->has('dabirkhane')) has-error @endif">
                                <label for="dabirkhane"><i class="fa fa-asterisk"></i>انتخاب دبیرخانه :</label>
                                <select name="dabirkhane">
                                    <option value="1">دبیرخانه 1</option>
                                    <option value="2">دبیرخانه 2</option>
                                    <option value="3">دبیرخانه 3</option>
                                    <option value="4">دبیرخانه 4</option>
                                </select>
                                @if ($errors->has('dabirkhane'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('dabirkhane') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-12 @if ($errors->has('description')) has-error @endif">
                                <label for="desc"><i class="fa fa-asterisk"></i>توضیحات :</label>
                                <textarea name="description" placeholder="توضیحات خود را وارد کنید..." >{{old('description')}} </textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('description') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-7 confirm-btn">
                                <button type="submit" class="login-btn">ارسال پیام</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
