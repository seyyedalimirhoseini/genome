@extends('UI.master')

@section('title')
    تأیید شماره تلفن
@endsection

@section('sidebar')
@endsection

@section('content')
    <div class="container">
        <form class="form" action="" method="get">
            <div class="input-div">
                <div class="row">
                    <div class="col-md-6">
                        <label for="code">کد تأیید را وارد کنید:</label>
                        <input type="text" name="code" placeholder="کد تأیید ارسال شده را وارد کنید..." autofocus required>
                    </div>
                    <div class="col-md-7 confirm-btn">
                        <button type="submit" class="login-btn">تأیید</button>
                        <a class="cancel-btn" href="{{Route('home.page')}}">انصراف</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection