@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | مشخصات کاربر
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h3>مشخصات کاربر :</h3>
            </div>
            <div class="container">
                <form class="form">
                    <div class="avatar-div">

                        @if(auth()->user()->image !='null')

                            <img src="{{URL('images/'.auth()->user()->image)}}"> <!-- Change -->
                        @else
                            <img src="{{URL('images/Avatar.png')}}"> <!-- Change -->

                        @endif
                    </div>
                    <div class="input-div">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">نام :</label>
                                <input type="text" name="name" value="{{$user->name}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="lastname">نام خانوادگی :</label>
                                <input type="text" name="lastname" value="{{$user->lastname}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="nationalcode">کد ملی :</label>
                                <input type="text" name="nationalcode" value="{{$user->nationalcode}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="phone">موبایل :</label>
                                <input type="text" name="phone" value="{{$user->phone}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="email">ایمیل :</label>
                                <input type="email" name="email" value="{{$user->email}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="field">رشته تحصیلی :</label>
                                <input type="text" name="field" value="{{$user->field}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="degree">مدرک تحصیلی :</label>
                                <input type="text" name="degree" value="{{$user->degree}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <label for="states">استان :</label>
                                    <select name="states" disabled>
                                        <option value="{{$user->state->id}}">{{$user->state['name']}}</option>

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="cities">شهر :</label>
                                    <select name="cities" disabled>
                                        <option value="{{$user->city->id}}">{{$user->city['name']}}</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="address">آدرس :</label>
                                <input type="text" name="address" value="{{$user->address}}" disabled>
                            </div>
                            <div class="col-md-6 confirm-btn">
                                <a class="cancel-btn" href="{{Route('users.list')}}">بازگشت</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
