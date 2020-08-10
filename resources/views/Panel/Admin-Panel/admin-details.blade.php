@extends('Panel.Admin-Panel.admin-panel')

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                    <h3>مدیر عزیز به پنل خود خوش آمدید!</h3>
                    @else
                    <h3>     {{auth()->user()->name}}  عزیز به پنل خود خوش آمدید!  </h3>
                    @endif

            </div>
            @include('UI.Parts.message')>
            <div class="container">
                @if(\Illuminate\Support\Facades\Auth::check())


                <form class="form">
                    <div class="avatar-div">
                        @if(auth()->user()->image !=null)

                            <img src="{{URL('images/'.auth()->user()->image)}}"> <!-- Change -->
                        @else
                            <img src="{{URL('images/Avatar.png')}}"> <!-- Change -->

                        @endif
                    </div>
                    <div class="input-div">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">نام :</label>
                                <input type="text" name="name" value="{{auth()->user()->name}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="lastname">نام خانوادگی :</label>
                                <input type="text" name="lastname" value="{{auth()->user()->lastname}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="nationalcode">کد ملی :</label>
                                <input type="text" name="nationalcode" value="{{auth()->user()->nationalcode}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="phone">موبایل :</label>
                                <input type="text" name="phone" value="{{auth()->user()->phone}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="email">ایمیل :</label>
                                <input type="email" name="email" value="{{auth()->user()->email}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="field">رشته تحصیلی :</label>
                                <input type="text" name="field" value="{{auth()->user()->field}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="degree">مدرک تحصیلی :</label>
                                <input type="text" name="degree" value="{{auth()->user()->degree}}" disabled>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6">
                                    <label for="states">استان :</label>
                                    <select name="states" disabled>
                                        <option value="{{auth()->user()->state->id}}">{{auth()->user()->state['name']}}</option>

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="cities">شهر :</label>
                                    <select name="cities" disabled>
                                        <option value="{{auth()->user()->city->id}}">{{auth()->user()->city['name']}}</option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="address">آدرس :</label>
                                <input type="text" name="address" value="{{auth()->user()->address}}" disabled>
                            </div>
                            <div class="col-md-6 confirm-btn">
                                <a class="edit-btn-a" href="{{Route('admin.edit',['id'=>auth()->user()->id])}}">ویرایش کردن</a>
                            </div>
                        </div>
                    </div>
                </form>
                    @endif
            </div>
        </div>
    </div>
@endsection
