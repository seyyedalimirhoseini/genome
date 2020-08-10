@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | نمایش اسلایدر  رویدادها
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>اسلایدر رویدادها :</h4>
            </div>
            @include('UI.Parts.message')
            <div class="container">
                <div class="add-slider">
                    <a href="javascript:void(0)" onclick="show_add_form()"><i class="fa fa-plus"></i>افزودن اسلایدر</a>
                    <div class="slider-div" id="add-btn">
                        <div class="slider-form">
                            <form action="{{Route('events.store')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="input-div">
                                    <div class="row">
                                        <div class="col-sm-6 ">
                                            <label for="name"><i class="fa fa-asterisk"></i>نام اسلایدر :</label>
                                            <input type="text" name="name" placeholder="نام اسلایدر را وارد کنید..."
                                                   value="{{old('name')}}">

                                        </div>
                                        <div class="col-sm-6 ">
                                            <label for="title"><i class="fa fa-asterisk"></i>عنوان اسلایدر :</label>
                                            <input type="text" name="title" placeholder="عنوان اسلایدر را وارد کنید..."
                                                   value="{{old('title')}}">

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
                                            <label for="text"><i class="fa fa-asterisk"></i>توضیحات اسلایدر :</label>
                                            <textarea name="text" maxlength="200"
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
                @foreach($events as $event)
                    <div class="slider-div">

                        <div class="slider-title">
                            <span>{{$event->name}}</span>
                        </div>

                        <div class="slider-image">
                            <img src="{{URL('images/'.$event->image)}} ">
                            <div class="slider-desc">
                                <span class="slider-desc-title">{{$event->title}}</span>
                                <span class="slider-desc-text">{!! Str::limit($event->text,20) !!}</span>
                            </div>

                            <a class="slider-desc-btn slider-desc-edit-btn" onclick="show_form({{$event->id}})"><i
                                    class="fa fa-pencil"></i>ویرایش</a>
                            <a class="slider-desc-btn slider-desc-delete-btn"
                               href="{{Route('events.delete',['id'=>$event->id])}}"><i class="fa fa-times"></i>حذف</a>

                        </div>


                        <div class="slider-form" id="{{$event->id}}">
                            <form action="{{Route('events.update',['id'=>$event->id])}}" method="post"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="input-div">
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <label for="name">نام اسلایدر :</label>
                                            <input type="text" name="name" value="{{$event->name}}">

                                        </div>
                                        <div class="col-md-6 ">
                                            <label for="title">عنوان اسلایدر :</label>
                                            <input type="text" name="title" value="{{$event->title}}">

                                        </div>
                                        <div class="col-md-6 @if ($errors->has('image')) has-error @endif">
                                            <label for="image"><i class="fa fa-asterisk"></i>تصویر اسلایدر :</label>
                                            <input type="file" name="image" id="image" value="">
                                            @if ($errors->has('image'))
                                                <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('image') }}</small>
                                     </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12 @if ($errors->has('text')) has-error @endif">
                                            <label for="text">توضیحات اسلایدر :</label>
                                            <textarea name="text" maxlength="200">{{$event->text}}</textarea>
                                            @if ($errors->has('text'))
                                                <span class="invalid-feedback" role="alert">
                                            <small style="color: red">{{ $errors->first('text') }}</small>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="edit-btn">بروز رسانی</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {!! $events->links() !!}

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
