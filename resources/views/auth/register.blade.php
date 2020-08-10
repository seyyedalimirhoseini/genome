{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Register') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('register') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

                                {{--@error('name')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

                                {{--@error('email')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

                                {{--@error('password')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Register') }}--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}


@extends('UI.master')

@section('title')
    ثبت نام
@endsection

@section('content')
    <div class="container width-85">
        <form class="form" method="POST" action="{{ route('register') }} " enctype="multipart/form-data">
            @csrf

            <div class="avatar-div">
                <img src="{{URL('images/Avatar.png')}}">
            </div>
            <div class="input-div">
                <div class="row">
                    <div class="col-md-6 @if ($errors->has('name')) has-error @endif">
                        <label for="name"><i class="fa fa-asterisk"></i>نام :</label>
                        <input   id="name" type="text" name="name" placeholder="نام خود را وارد کنید..."  value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('name') }}</small>
                                     </span>
                        @endif
                    </div>
                    <div class="col-md-6 @if ($errors->has('lastname')) has-error @endif">
                        <label for="lastname"><i class="fa fa-asterisk"></i>نام خانوادگی :</label>
                        <input id="lastname" type="text" name="lastname" placeholder="نام خانوادگی خود را وارد کنید..."  value="{{ old('lastname') }}">
                        @if ($errors->has('lastname'))
                            <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('lastname') }}</small>
                                     </span>
                        @endif
                    </div>
                    <div class="col-md-6 @if ($errors->has('nationalcode')) has-error @endif">
                        <label for="nationalcode"><i class="fa fa-asterisk"></i>کد ملی :</label>
                        <input id="nationalcode" type="text" name="nationalcode" placeholder="کد ملی خود را وارد کنید..."  value="{{ old('nationalcode') }}">
                        @if ($errors->has('nationalcode'))
                            <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('nationalcode') }}</small>
                                     </span>
                        @endif
                    </div>
                    <div class="col-md-6 @if ($errors->has('phone')) has-error @endif">
                        <label for="phone"><i class="fa fa-asterisk"></i>موبایل :</label>
                        <input id="phone" type="text" name="phone" placeholder="موبایل خود را وارد کنید..."  value="{{ old('phone') }}" >
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('phone') }}</small>
                                     </span>
                        @endif
                    </div>
                    <div class="col-md-6 @if ($errors->has('email')) has-error @endif">
                        <label for="email"><i class="fa fa-asterisk"></i>ایمیل :</label>
                        <input id="email" type="email" name="email" placeholder="ایمیل خود را وارد کنید..."  value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('email') }}</small>
                                     </span>
                        @endif
                    </div>
                    <div class="col-md-6 @if ($errors->has('field')) has-error @endif">
                        <label for="field"><i class="fa fa-asterisk"></i>رشته تحصیلی :</label>
                        <input  id="field" type="text" name="field" placeholder="رشته تحصیلی خود را وارد کنید..."  value="{{ old('field') }}">
                        @if ($errors->has('field'))
                            <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('field') }}</small>
                                     </span>
                        @endif
                    </div>
                    <div class="col-md-6 @if ($errors->has('degree')) has-error @endif">
                        <label for="degree"><i class="fa fa-asterisk"></i>مدرک تحصیلی :</label>
                        <input  id="degree" type="text" name="degree" placeholder="مدرک تحصیلی خود را وارد کنید..."  value="{{ old('degree') }}" >
                        @if ($errors->has('degree'))
                            <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('degree') }}</small>
                                     </span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6 @if ($errors->has('state')) has-error @endif">
                            <label for="states"><i class="fa fa-asterisk"></i>استان :</label>
                            <select name="state">
                                <option value="">--- استان خود را وارد کنید ---</option>
                                @foreach ($states as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('state'))
                                <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('state') }}</small>
                                     </span>
                            @endif
                        </div>
                        <div class="col-md-6 @if ($errors->has('city')) has-error @endif">
                            <label for="cities"><i class="fa fa-asterisk"></i>شهر :</label>
                            <select name="city"></select>
                            @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('city') }}</small>
                                     </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 @if ($errors->has('address')) has-error @endif">
                        <label for="address"><i class="fa fa-asterisk"></i>آدرس :</label>
                        <input id="address" type="text" name="address" placeholder="ادامه آدرس را وارد کنید..."  value="{{ old('address') }}">
                        @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('address') }}</small>
                                     </span>
                        @endif
                    </div>
                    <div class="col-md-6 @if ($errors->has('password')) has-error @endif">
                        <label for="password"><i class="fa fa-asterisk"></i>رمز عبور :</label>
                        <input id="password" type="password" name="password" placeholder="رمز عبور خود را وارد کنید..."  >
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('password') }}</small>
                                     </span>
                        @endif
                    </div>
                    <div class="col-md-6 @if ($errors->has('password_confirmation')) has-error @endif">
                        <label for="password-confirm"><i class="fa fa-asterisk"></i>تکرار رمز عبور :</label>
                        <input id="password_confirmation"  type="password" name="password_confirmation" placeholder="تکرار رمز عبور خود را وارد کنید..." >
                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('password_confirmation') }}</small>
                                     </span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="image @if ($errors->has('image')) has-error @endif"><i class="fa fa-asterisk"></i>افزودن تصویر :</label>
                        <input id="image" type="file" name="image"  placeholder="تکرار رمز عبور خود را وارد کنید..." >
                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('image') }}</small>
                                     </span>
                        @endif
                    </div>
                    <div class="col-md-7 confirm-btn">
                        <button type="submit" class="login-btn">ثبت نام</button>
                        <a class="cancel-btn" href="{{Route('home.page')}}">انصراف</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @section('js')
        <script type="text/javascript">

            $(document).ready(function() {
                $('select[name="state"]').on('change', function() {
                    var stateID = $(this).val();
                    if(stateID) {
                        $.ajax({
                            // headers: {
                            //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                            // },
                            url:"{{url('register/ajax/')}}/"+stateID,
//                             url: 'register/ajax/'+stateID,
                            type: "GET",
                            dataType: "json",
                            success:function(data) {


                                $('select[name="city"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });


                            }
                        });
                    }else{
                        $('select[name="city"]').empty();
                    }
                });
            });
        </script>

    @endsection
@endsection