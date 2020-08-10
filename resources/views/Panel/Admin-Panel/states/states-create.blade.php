@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | افزودن استان
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>افزودن استان :</h4>
            </div>
            @include('UI.Parts.message')
            <div class="container">
                <form class="form margin-top-0" action="{{Route('states.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="input-div">
                        <div class="row">
                            <div class="col-md-6 @if ($errors->has('name')) has-error @endif">
                                <label for="course"><i class="fa fa-asterisk"></i>نام استان :</label>
                                <input type="text"  name="name" id="name" placeholder="نام استان را وارد کنید..."> <!-- Change -->
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('name') }}</small>
                                     </span>
                                @endif
                            </div>



                            <div class="col-md-7 confirm-btn"> <!-- Change -->
                                <button type="submit" class="login-btn">افزودن استان</button>
                                <a class="cancel-btn" href="{{Route('courses.show')}}">انصراف</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
