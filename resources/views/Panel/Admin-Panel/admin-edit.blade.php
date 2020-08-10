@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | ویرایش مشخصات
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h3>ویرایش مشخصات :</h3>
            </div>
            <div class="container">
                <form class="form" action="{{Route('admin.update',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="avatar-div">
                        @if(auth()->user()->image !=null)

                            <img src="{{URL('images/'.auth()->user()->image)}}"> <!-- Change -->
                        @else
                            <img src="{{URL('images/Avatar.png')}}"> <!-- Change -->

                        @endif                         </div>
                    <div class="input-div">
                        <div class="row">
                            <div class="col-md-6  @if ($errors->has('name')) has-error @endif">
                                <label for="name"><i class="fa fa-asterisk"></i>نام :</label>
                                <input type="text" name="name" value="{{$user->name}}" >
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('name') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('lastname')) has-error @endif">
                                <label for="lastname"><i class="fa fa-asterisk"></i>نام خانوادگی :</label>
                                <input type="text" name="lastname" value="{{$user->lastname}}">
                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('lastname') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('nationalcode')) has-error @endif">
                                <label for="nationalcode"><i class="fa fa-asterisk"></i>کد ملی :</label>
                                <input type="text" name="nationalcode" value="{{$user->nationalcode}}" >
                                @if ($errors->has('nationalcode'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('nationalcode') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('phone')) has-error @endif">
                                <label for="phone"><i class="fa fa-asterisk"></i>موبایل :</label>
                                <input type="text" name="phone" value="{{$user->phone}}" >
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('phone') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('email')) has-error @endif">
                                <label for="email"><i class="fa fa-asterisk"></i>ایمیل :</label>
                                <input type="email" name="email" value="{{$user->email}}" >
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('email') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('field')) has-error @endif">
                                <label for="field">رشته تحصیلی :</label>
                                <input type="text" name="field" value="{{$user->field}}" >
                                @if ($errors->has('field'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('field') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('degree')) has-error @endif">
                                <label for="degree">مدرک تحصیلی :</label>
                                <input type="text" name="degree" value="{{$user->degree}}" >
                                @if ($errors->has('degree'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('degree') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6 @if ($errors->has('state')) has-error @endif">
                                    <label for="states">استان :</label>
                                    <select name="state">
                                        {{--<option value="{{$user->id}}" selected>{{$user->state['name']}}</option>--}}
                                        @foreach ($states as $key => $value)
                                            <option @if($value==$user->state['name']) selected="selected"   @endif value="{{ $key }}">{{ $value }}</option>
                                        @endforeach

                                    </select>
                                    @if ($errors->has('state'))
                                        <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('state') }}</small>
                                     </span>
                                    @endif
                                </div>
                                <div class="col-md-6 @if ($errors->has('city')) has-error @endif">
                                    <label for="cities">شهر :</label>
                                    {{--<select name="cities">--}}
                                        {{--<option value="{{$user->city->id}}">{{$user->city['name']}}</option>--}}

                                        <select name="city">
                                            <option value="{{$user->city->id}}">{{$user->city['name']}}</option>


                                        </select>
                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('city') }}</small>
                                     </span>
                                    @endif
                                    {{--</select>--}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="address @if ($errors->has('address')) has-error @endif">آدرس :</label>
                                <input type="text" name="address" value="{{$user->address}}">
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('address') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('password')) has-error @endif">
                                <label for="pass"><i class="fa fa-asterisk"></i>رمز عبور :</label>
                                <input  id="password" type="password" name="password" value="" >
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('password') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('password_confirmation')) has-error @endif">
                                <label for="password_confirmation"><i class="fa fa-asterisk"></i>تکرار رمز عبور :</label>
                                <input  id="password_confirmation" type="password" name="password_confirmation" value="" >
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('password_confirmation') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('image')) has-error @endif">
                                <label for="image">افزودن تصویر :</label>
                                <input type="file" name="image" >
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('image') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-7 confirm-btn">
                                <button type="submit" class="edit-btn">بروزرسانی</button>
                                <a class="cancel-btn" href="{{Route('admin.panel')}}">انصراف</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="state"]').on('change', function() {
                var stateID = $(this).val();
                if(stateID) {
                    $.ajax({
                        // url: 'edit/ajax/'+stateID,
                        url:"{{url('admin/edit/ajax/')}}/"+stateID,
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
