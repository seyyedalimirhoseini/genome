@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | افزودن شهرستان
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>افزودن شهرستان :</h4>
            </div>
            @include('UI.Parts.message')
            <div class="container">
                <form class="form margin-top-0" action="{{Route('cities.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="input-div">
                        <div class="row">
                            <div class="col-md-6 @if ($errors->has('name')) has-error @endif">

                            <label for="name"><i class="fa fa-asterisk"></i> نام شهرستان :</label>
                                <input type="text" name="name" id="name" placeholder="نام شهرستان را وارد کنید..." value="{{old('name')}}"> <!-- Change -->
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('name') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6  @if ($errors->has('state_id')) has-error @endif">
                                <label for="state_id"><i class="fa fa-asterisk"></i>نام استان :</label>
                                <select  name="state_id" id="exampleFormControlSelect1"> <!-- Change -->
                                    {{--<option value="0">---</option>--}}
                                    @foreach($states as $key=>$value)
                                        <option value="{{$key}}" >{{$value}}</option>

                                    @endforeach
                                </select>
                                @if ($errors->has('state_id'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('state_id') }}</small>
                                     </span>
                                @endif
                            </div>




                            <div class="col-md-7 confirm-btn"> <!-- Change -->
                                <button type="submit" class="login-btn">افزودن شهرستان</button>
                                <a class="cancel-btn" href="{{Route('cities.show')}}">انصراف</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
