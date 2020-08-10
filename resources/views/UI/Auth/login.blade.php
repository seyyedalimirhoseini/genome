@extends('UI.master')

@section('title')
    ورود
@endsection

@section('sidebar')
@endsection

@section('content')
    <div class="container">
        <form class="form" action="{{Route('user-panel')}}" method="get">
            <div class="avatar-div">
                <img src="{{URL('images/Avatar.png')}}">
            </div>
            <div class="input-div">
                <div class="row">
                    <div class="col-md-6">
                        <label for="email">ایمیل :</label>
                        <input type="email" name="email" placeholder="ایمیل خود را وارد کنید..." autofocus required oninvalid="this.setCustomValidity('ایمیل نادرست است.')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col-md-6">
                        <label for="pass">رمز عبور :</label>
                        <input type="password" name="pass" placeholder="رمز عبور خود را وارد کنید..." required oninvalid="this.setCustomValidity('رمز عبور الزامی است.')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col-md-6 confirm-btn">
                        <button type="submit" class="login-btn">ورود</button>
                        <a class="cancel-btn" href="{{Route('home-page')}}">انصراف</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection