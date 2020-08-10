@extends('Panel.User-Panel.user-panel')

@section('title')
    کاربر | ثبت ایده
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>ثبت ایده :</h4>
            </div>
            <div class="container">
                <form class="form margin-top-0" action="{{Route('idea.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="input-div">
                        <div class="row">
                            <div class="col-md-6 @if ($errors->has('title')) has-error @endif">
                                <label for="title"><i class="fa fa-asterisk"></i>عنوان ایده :</label>
                                <input type="text" id="title" name="title" placeholder="عنوان ایده را وارد کنید..."  value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('title') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('field')) has-error @endif">
                                <label for="field"><i class="fa fa-asterisk"></i>رشته مرتبط :</label>
                                {{--<input type="text" id="field" name="field" placeholder="رشته مرتبط را وارد کنید..."  value="{{ old('field') }}">--}}
                                <select name="field_id">
                                    @foreach($fields as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-12 @if ($errors->has('description')) has-error @endif">
                                <label for="description"><i class="fa fa-asterisk"></i>شرح ایده :</label>
                                <textarea type="text" id="description" name="description" placeholder="شرح مختصری از ایده را وارد کنید..." maxlength="500" >{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('description') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 confirm-btn">
                                <button type="submit" class="login-btn">ثبت ایده</button>
                                {{--<a class="cancel-btn" href="">انصراف</a>--}}
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