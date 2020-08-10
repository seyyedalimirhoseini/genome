@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | تیزر
@endsection

@section('content')
    <div class="container">
        <div class="user-details">

            <div class="page-title">
                <h4>تیزر:</h4>
            </div>
            <div class="container">
                <div class="row">
                    @include('UI.Parts.message')

                    @foreach($poster as $poster)
                    <div class="slider-div">
                        <div class="slider-title">

                            <span>پوستر :</span>

                        </div>

                            <div class="slider-image">



                                    <img src="{{URL('video/'.$poster->tizer)}}">

                                    <a class="slider-desc-btn slider-desc-edit-btn" onclick="show_form(poster)"><i
                                        class="fa fa-pencil"></i>ویرایش</a>
                            <a class="slider-desc-btn slider-desc-delete-btn" href="{{Route('poster.delete',['id'=>$poster->id])}}"><i class="fa fa-times"></i>حذف</a>


                        </div>
                        <div class="slider-form" id="poster">
                            <form action="{{Route('poster.update',['id'=>$poster->id])}}" method="post" enctype="multipart/form-data">
                                 {{csrf_field()}}

                                <div class="input-div">
                                    <div class="row">
                                        <div class="col-md-12  @if ($errors->has('name')) has-error @endif">

                                            <label for="name"><i class="fa fa-asterisk"></i>نام پوستر :</label>

                                                <input type="text" name="name" value="{{$poster->name}}">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                 <small style="color: red">{{ $errors->first('name') }}</small>
                                                 </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12  @if ($errors->has('tizer')) has-error @endif ">

                                            <label for="tizer"><i class="fa fa-asterisk"></i>پوستر تیزر :</label>

                                                <input type="file" name="tizer" value="">
                                            @if ($errors->has('tizer'))
                                                <span class="invalid-feedback" role="alert">
                                                 <small style="color: red">{{ $errors->first('tizer') }}</small>
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
            </div>





            @endforeach


            <div class="container">
                <div class="row">

                    @foreach($tizer as $tizer)
                        <div class="slider-div">
                            <div class="slider-title">

                                    <span>تیزر :</span>


                            </div>

                            <div class="slider-image">

                                    <video src="{{URL('video/'.$tizer->tizer)}}" controls></video>

                                <a class="slider-desc-btn slider-desc-edit-btn" onclick="show_form(tizer)"><i
                                        class="fa fa-pencil"></i>ویرایش</a>
                                <a class="slider-desc-btn slider-desc-delete-btn" href="{{Route('tizer.delete',['id'=>$tizer->id])}}"><i class="fa fa-times"></i>حذف</a>


                            </div>
                            <div class="slider-form" id="tizer">
                                <form action="{{Route('tizer.update',['id'=>$tizer->id])}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="input-div">
                                        <div class="row">
                                            <div class="col-md-12  @if ($errors->has('name')) has-error @endif">

                                                    <label for="name"><i class="fa fa-asterisk"></i>نام تیزر :</label>

                                                <input type="text" name="name" value="{{$tizer->name}}">
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                 <small style="color: red">{{ $errors->first('name') }}</small>
                                                 </span>
                                                @endif
                                            </div>
                                            <div class="col-md-12  @if ($errors->has('tizer')) has-error @endif ">

                                                    <label for="tizer"><i class="fa fa-asterisk"></i> تیزر :</label>


                                                <input type="file" name="tizer" value="">
                                                @if ($errors->has('tizer'))
                                                    <span class="invalid-feedback" role="alert">
                                                 <small style="color: red">{{ $errors->first('tizer') }}</small>
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


            </div>
            @endforeach

        </div>
    </div>

@endsection
{{--    <script>--}}
{{--        function show_form(id) {--}}
{{--            $(`#${id}`).toggle();--}}
{{--        }--}}

{{--        function show_add_form() {--}}
{{--            $('#add-btn').toggle();--}}
{{--        }--}}
{{--    </script>--}}
@section('js')
    <script>
        function show_form(id) {
            $(id).toggle();
        }
    </script>
@endsection

