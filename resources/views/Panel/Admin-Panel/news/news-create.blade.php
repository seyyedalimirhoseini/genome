@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | افزودن خبر
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>افزودن خبر :</h4>
            </div>
            <div class="container">
                <form class="form" action="{{Route('news.store')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{--<div class="avatar-div">--}}
                        {{--<img src="{{URL('images/Avatar.png')}}">--}}
                    {{--</div>--}}
                    <div class="input-div ">
                        <div class="row">
                            <div class="col-md-6 @if ($errors->has('title')) has-error @endif" >
                                <label for="title"><i class="fa fa-asterisk"></i>عنوان خبر :</label>
                                <input type="text" name="title" id="title" placeholder="عنوان خبر را وارد کنید..."   value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('title') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('image')) has-error @endif" >
                                <label for="image">تصویر خبر :</label>
                                <input type="file" name="image" id="image">
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('image') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-12 @if ($errors->has('body')) has-error @endif" >
                                <label for="body"><i class="fa fa-asterisk"></i>شرح خبر :</label>
                                <textarea type="text" name="body" id="body" placeholder="شرح مختصری از خبر را وارد کنید..." >{{old('body')}}</textarea>
                                @if ($errors->has('body'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('body') }}</small>
                                     </span>
                                @endif
                            </div>
                            {{--<div class="col-md-12" >--}}
                                {{--<label for="body"><i class="fa fa-asterisk"></i>وضعیت انتشار:</label>--}}
                                {{--<input type="checkbox" id="publication_status" name="publication_status" checked />--}}

                            {{--</div>--}}
                            <div class="col-md-6 confirm-btn">
                                <button type="submit" class="login-btn">افزودن خبر</button>
                                <a class="cancel-btn" href="{{Route('news.show')}}">انصراف</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
