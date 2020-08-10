@extends('UI.master')

@section('title')
    فایل های آموزشی
@endsection

@section('css')
    <link rel="stylesheet" href="{{URL('css/Panel/user-details.css')}}">
    <link rel="stylesheet" href="{{URL('css/Panel/box.css')}}">
@endsection

@section('content')
    <div class="container news-container">
        <div class="user-details">
            <div class="page-title">
                <h4>فایل های آموزشی :</h4>
            </div>
            @foreach($files as $file)
            <div class="container">
                <div class="box">
                    <div class="row">
                        <div class="col-lg-4 box-image">
                            <img src="{{URL('image/'.$file->image)}}">

                        </div>
                        <div class="col-lg-8 box-details">
                            <div class="details-title">
                                <h2>{{$file->name}}</h2>
                            </div>
                            <div class="details-text">
                                <p>{!! Str::limit($file->body,200)!!}</p>
                            </div>
                        </div>
                        <div class="col-lg-8 box-btn">
                            <a class="show-btn" href="{{$file->path()}}"><i class="fa fa-newspaper-o"></i>نمایش</a>
                            @if(!Auth::check())
                            <a class="edit-btn" href="#"><i class="fa fa-lock"></i>دانلود فایل</a>
                            @else
{{--                             <a class="edit-btn" href="{{ url('/file').'/'.$file->download() }}" download="{{$file->file}}"><i class="fa fa-download"></i>دانلود فایل</a>--}}
                             <a class="edit-btn" href="{{ $file->download() }}" ><i class="fa fa-download"></i>دانلود فایل</a>

                            @endif
                                <span>تاریخ :  {{jdate($file->file_create_at)->format('%d,%B ,%Y')}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$files->links()}}
    </div>
@endsection

