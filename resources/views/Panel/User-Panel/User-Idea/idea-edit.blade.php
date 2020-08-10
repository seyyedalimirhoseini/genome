@extends('Panel.User-Panel.user-panel')

@section('title')
    کاربر | ویرایش ایده
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>ویرایش ایده :</h4>
            </div>
            <div class="container">
                <form class="form margin-top-0" action="{{Route('idea.update',['id'=>$idea->id])}}" method="POST">
                    {{csrf_field()}}
                    <div class="input-div">
                        <div class="row">
                            <div class="col-md-6 @if ($errors->has('title')) has-error @endif">
                                <label for="idea"><i class="fa fa-asterisk"></i>عنوان ایده :</label>
                                <input type="text" name="title" value="{{$idea->title}}">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('title') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('field')) has-error @endif">
                                <label for="field"><i class="fa fa-asterisk"></i>رشته مرتبط :</label>
                                <input type="text" name="field" value="{{$idea->field}}" >
                                @if ($errors->has('field'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('field') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-12 @if ($errors->has('description')) has-error @endif">
                                <label for="description"><i class="fa fa-asterisk"></i>شرح ایده :</label>
                                <textarea type="text" id="description" name="description"  maxlength="500" >{{$idea->description}}</textarea>
                                @if ($errors->has('field'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('description') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 confirm-btn">
                                <button type="submit" class="edit-btn">بروزرسانی</button>
                                <a class="cancel-btn" href="{{Route('idea.show')}}">انصراف</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description' ,{
            filebrowserUploadUrl : '/admin/panel/upload-image',
            filebrowserImageUploadUrl :  '/admin/panel/upload-image'
        });
    </script>
@endsection