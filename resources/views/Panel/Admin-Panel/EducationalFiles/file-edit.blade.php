@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | ویرایش فایل
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>ویرایش فایل :</h4>
            </div>

            <div class="container">
                <form class="form" action="{{Route('file.update',['id'=>$file->id])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="input-div">
                        <div class="row">
                            <div class="col-md-6 @if ($errors->has('name')) has-error @endif">
                                <label for="name"><i class="fa fa-asterisk"></i>نام فایل :</label>
                                <input type="text" name="name" id="name" value="{{$file->name}}" placeholder="نام فایل را وارد کنید...">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('name') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 @if ($errors->has('image')) has-error @endif">
                                <label for="image">تصویر فایل :</label>
                                <input type="file" name="image" id="image">
                                <input type="image" id="image" src="{{URL('image/'.$file->image)}}" style="width: 100px;height: 100px">
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('image') }}</small>
                                     </span>
                                @endif
                            </div>

                            <div class="col-md-6 @if ($errors->has('file')) has-error @endif">
                                <label for="image"> فایل :</label>
                                <input type="file" name="file" id="file">
                                <input  id="file"  value="{{$file->file}}">
                                @if ($errors->has('file'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('file') }}</small>
                                     </span>
                                @endif
                            </div>

                            <div class="col-md-12 @if ($errors->has('body')) has-error @endif">
                                <label for="body"><i class="fa fa-asterisk"></i>توضیحات فایل :</label>
                                <textarea type="text" name="body" id="body" maxlength="2000" placeholder="توضیحاتی در مورد فایل وارد کنید (حداکثر 2000 کاراکتر) ...">{{$file->body}}</textarea>
                                @if ($errors->has('body'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('body') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 confirm-btn">
                                <button type="submit" class="edit-btn">بروزرسانی</button>
                                <a class="cancel-btn" href="{{Route('files.show')}}">انصراف</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
