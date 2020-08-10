{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Login') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('login') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

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
                                {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

                                {{--@error('password')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<div class="form-check">--}}
                                    {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                    {{--<label class="form-check-label" for="remember">--}}
                                        {{--{{ __('Remember Me') }}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-8 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Login') }}--}}
                                {{--</button>--}}

                                {{--@if (Route::has('password.request'))--}}
                                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                        {{--{{ __('Forgot Your Password?') }}--}}
                                    {{--</a>--}}
                                {{--@endif--}}
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
    ورود
@endsection

@section('sidebar')
@endsection

@section('content')
    <div class="container width-85">
        <form class="form" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="avatar-div">
                <img src="{{URL('images/Avatar.png')}}">
            </div>
            @include('UI.Parts.message')
            <div class="input-div">
                <div class="row">
                    <div class="col-md-6 @if ($errors->has('email')) has-error @endif">
                        <label for="email"><i class="fa fa-asterisk"></i>{{ __('ایمیل') }} :</label>
                        <input id="email" type="email" name="email"  placeholder="ایمیل خود را وارد کنید..." value="{{ old('email') }}"  >
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('email') }}</small>
                                     </span>
                        @endif
                    </div>
                    <div class="col-md-6 @if ($errors->has('password')) has-error @endif">
                        <label for="password"><i class="fa fa-asterisk"></i>{{ __('رمز عبور') }} :</label>
                        <input id="password" type="password"  placeholder="رمز عبور خود را وارد کنید..."  name="password"  >
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('password') }}</small>
                                     </span>
                        @endif

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="width: 5%"> <!-- Change -->

                                <label class="form-check-label" for="remember">
                                    {{ __('مرا به خاطر بسپار') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 confirm-btn">
                        <button type="submit" class="login-btn"> {{ __('ورود') }}</button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('رمز عبور خود را فراموش کرده اید؟') }}
                            </a>
                        @endif
                        <a class="cancel-btn" href="{{Route('home.page')}}">انصراف</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
