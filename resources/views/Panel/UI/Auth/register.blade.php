@extends('UI.master')

@section('title')
    ثبت نام
@endsection

@section('content')
    <div class="container">
        <form class="form" action="">
            <div class="avatar-div">
                <img src="{{URL('images/Avatar.png')}}">
            </div>
            <div class="input-div">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name"><i class="fa fa-asterisk"></i>نام :</label>
                        <input type="text" name="name" placeholder="نام خود را وارد کنید..." autofocus required oninvalid="this.setCustomValidity('نام لزامی است.')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col-md-6">
                        <label for="lastname"><i class="fa fa-asterisk"></i>نام خانوادگی :</label>
                        <input type="text" name="lastname" placeholder="نام خانوادگی خود را وارد کنید..." required oninvalid="this.setCustomValidity('نام خانوادگی الزامی است.')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col-md-6">
                        <label for="nationalcode"><i class="fa fa-asterisk"></i>کد ملی :</label>
                        <input type="text" name="nationalcode" placeholder="کد ملی خود را وارد کنید..." required oninvalid="this.setCustomValidity('کد ملی الزامی است.')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col-md-6">
                        <label for="phone"><i class="fa fa-asterisk"></i>موبایل :</label>
                        <input type="text" name="phone" placeholder="موبایل خود را وارد کنید..." required oninvalid="this.setCustomValidity('موبایل الزامی است.')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col-md-6">
                        <label for="email"><i class="fa fa-asterisk"></i>ایمیل :</label>
                        <input type="email" name="email" placeholder="ایمیل خود را وارد کنید..." required oninvalid="this.setCustomValidity('ایمیل نادرست است.')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col-md-6">
                        <label for="field">رشته تحصیلی :</label>
                        <input type="text" name="field" placeholder="رشته تحصیلی خود را وارد کنید...">
                    </div>
                    <div class="col-md-6">
                        <label for="degree">مدرک تحصیلی :</label>
                        <input type="text" name="degree" placeholder="مدرک تحصیلی خود را وارد کنید...">
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <label for="states"><i class="fa fa-asterisk"></i>استان :</label>
                            <select name="states">
                                <option value="state">یزد</option>
                                <option value="state">تهران</option>
                                <option value="state">اصفهان</option>
                                <option value="state">شیراز</option>
                                <option value="state">مشهد</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="cities"><i class="fa fa-asterisk"></i>شهر :</label>
                            <select name="cities">
                                <option value="city">میبد</option>
                                <option value="city">مهریز</option>
                                <option value="city">یزد</option>
                                <option value="city">اردکان</option>
                                <option value="city">بافق</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="address">آدرس :</label>
                        <input type="text" name="address" placeholder="ادامه آدرس را وارد کنید...">
                    </div>
                    <div class="col-md-6">
                        <label for="pass"><i class="fa fa-asterisk"></i>رمز عبور :</label>
                        <input type="password" name="pass" placeholder="رمز عبور خود را وارد کنید..." required oninvalid="this.setCustomValidity('رمز عبور الزامی است.')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col-md-6">
                        <label for="repass"><i class="fa fa-asterisk"></i>تکرار رمز عبور :</label>
                        <input type="password" name="repass" placeholder="تکرار رمز عبور خود را وارد کنید..." required oninvalid="this.setCustomValidity('تکرار رمز عبور الزامی است.')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col-md-6">
                        <label for="pic">افزودن تصویر :</label>
                        <input type="file" name="pic">
                    </div>
                    <div class="col-md-7 confirm-btn">
                        <button type="submit" class="login-btn">ثبت نام</button>
                        <a class="cancel-btn" href="{{Route('home-page')}}">انصراف</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection