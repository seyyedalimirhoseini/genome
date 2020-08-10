@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | ویرایش خبر
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>ویرایش خبر :</h4>
            </div>
            <div class="container">
                <form class="form" action="{{Route('news.update',['id'=>$news->id])}}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                    {{--<div class="avatar-div">--}}
                        {{--<img src="{{URL('images/Avatar.png')}}">--}}
                    {{--</div>--}}
                    <div class="input-div">
                        <div class="row">
                            <div class="col-md-6 @if ($errors->has('title')) has-error @endif" >
                                <label for="title"><i class="fa fa-asterisk"></i>عنوان خبر :</label>
                                <input type="text" name="title"  value="{{$news->title}}">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('title') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('image')) has-error @endif">
                                <label for="image">تصویر خبر :</label>
                                <input type="file" name="image"  id="image" >
                                <input type="image" id="image" style="width: 100px;height: 100px" src="{{ url('image').'/'.$news->image }}">
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('image') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-12 @if ($errors->has('body')) has-error @endif">
                                <label for="body"><i class="fa fa-asterisk"></i>شرح خبر :</label>
                                <textarea type="text" name="body" >{{$news->body}}</textarea>
                                @if ($errors->has('body'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('body') }}</small>
                                     </span>
                                @endif
                                <div class="col-md-6 confirm-btn">
                                <button type="submit" class="edit-btn">ویرایش خبر</button>
                                <a class="cancel-btn" href="{{Route('news.show')}}">انصراف</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection