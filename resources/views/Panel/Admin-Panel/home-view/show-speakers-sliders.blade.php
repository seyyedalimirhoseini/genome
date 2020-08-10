@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | اسلایدر سخنرانان
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>اسلایدر سخنرانان :</h4>
            </div>
            @include('UI.Parts.message')
            <div class="container">
                <div class="row carousel-div organaizer-carousel">
                    <div class="add-slider">
                        <a href="javascript:void(0)" onclick="show_add_form()"><i class="fa fa-plus"></i>افزودن اسلایدر</a>
                        <div class="slider-div" id="add-btn">
                            <div class="slider-form">
                                <form action="{{Route('speakers.store')}}" method="post"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="input-div">
                                        <div class="row">
                                            <div class="col-sm-6  @if ($errors->has('name')) has-error @endif">
                                                <label for="name">نام اسلایدر :</label>
                                                <input type="text" name="name" placeholder="نام اسلایدر را وارد کنید..."
                                                       value="{{old('name')}}">
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                 <small style="color: red">{{ $errors->first('name') }}</small>
                                                 </span>
                                                @endif
                                            </div>
                                            <div class="col-sm-6  @if ($errors->has('title')) has-error @endif">
                                                <label for="title">عنوان اسلایدر :</label>
                                                <input type="text" name="title"
                                                       placeholder="عنوان اسلایدر را وارد کنید..."
                                                       value="{{old('title')}}">
                                                @if ($errors->has('title'))
                                                    <span class="invalid-feedback" role="alert">
                                             <small style="color: red">{{ $errors->first('title') }}</small>
                                             </span>
                                                @endif
                                            </div>
                                            <div class="col-sm-6 @if ($errors->has('image')) has-error @endif">
                                                <label for="image"><i class="fa fa-asterisk"></i>تصویر اسلایدر :</label>
                                                <input type="file" name="image">
                                                @if ($errors->has('image'))
                                                    <span class="invalid-feedback" role="alert">
                                                 <small style="color: red">{{ $errors->first('image') }}</small>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-sm-12 @if ($errors->has('text')) has-error @endif">
                                                <label for="text"></i>توضیحات اسلایدر
                                                    :</label>
                                                <textarea name="text" maxlength="180"
                                                          placeholder="متن مختصری در مورد اسلایدر وارد کنید (حداکثر 200 کاراکتر)...">{{old('text')}}</textarea>
                                                @if ($errors->has('text'))
                                                    <span class="invalid-feedback" role="alert">
                                            <small style="color: red">{{ $errors->first('text') }}</small>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="col-sm-12">
                                                <button type="submit" class="confirm-btn">افزودن</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @foreach($speakers as $speaker)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="slider-div">
                                <div class="slider-title">
                                    <span>{{$speaker->name}} :</span>
                                </div>
                                <div class="slider-image">
                                    <img src="{{URL('images/'.$speaker->image)}}">
                                    <div class="slider-desc">
                                        <span class="slider-desc-title">{{$speaker->title}}</span>
                                        <span class="slider-desc-text">{!! Str::limit($speaker->text,100) !!}</span>
                                    </div>
                                    <a class="slider-desc-btn slider-desc-edit-btn"
                                       onclick="show_form({{$speaker->id}})"><i class="fa fa-pencil"></i>ویرایش</a>
                                    <a class="slider-desc-btn slider-desc-delete-btn"
                                       href="{{Route('speakers.delete',['id'=>$speaker->id])}}"><i
                                            class="fa fa-times"></i>حذف</a>

                                </div>
                                <div class="slider-form" id="{{$speaker->id}}">
                                    <form action="{{Route('speakers.update',['id'=>$speaker->id])}}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="input-div">
                                            <div class="row">
                                                <div class="col-md-12 @if ($errors->has('name')) has-error @endif">
                                                    <label for="name">نام اسلایدر
                                                        :</label>
                                                    <input type="text" name="name" value="{{$speaker->name}}">
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" role="alert">
                                                 <small style="color: red">{{ $errors->first('name') }}</small>
                                                 </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-12 @if ($errors->has('title')) has-error @endif">
                                                    <label for="title">عنوان اسلایدر
                                                        :</label>
                                                    <input type="text" name="title" value="{{$speaker->title}}">
                                                    @if ($errors->has('title'))
                                                        <span class="invalid-feedback" role="alert">
                                             <small style="color: red">{{ $errors->first('title') }}</small>
                                             </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-12 @if ($errors->has('image')) has-error @endif">
                                                    <label for="image"><i class="fa fa-asterisk"></i>تصویر اسلایدر
                                                        :</label>
                                                    <input type="file" name="image" value="">
                                                    @if ($errors->has('image'))
                                                        <span class="invalid-feedback" role="alert">
                                              <small style="color: red">{{ $errors->first('image') }}</small>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-12 @if ($errors->has('text')) has-error @endif">
                                                    <label for="text">توضیحات اسلایدر
                                                        :</label>
                                                    <textarea name="text"
                                                              maxlength="180">{{$speaker->text}}</textarea>
                                                    @if ($errors->has('text'))
                                                        <span class="invalid-feedback" role="alert">
                                                    <small style="color: red">{{ $errors->first('text') }}</small>
                                                     </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="edit-btn">بروزرسانی</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        {!! $speakers->links() !!}
    </div>

@endsection

@section('js')
    <script>
        function show_form(id) {
            $(`#${id}`).toggle();
        }

        function show_add_form() {
            $('#add-btn').toggle();
        }
    </script>
@endsection
