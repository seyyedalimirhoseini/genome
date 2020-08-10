@extends('UI.master')

@section('title')
    جزئیات فایل
@endsection

@section('css')
    <link rel="stylesheet" href="{{URL('css/Panel/user-details.css')}}">
    <link rel="stylesheet" href="{{URL('css/Panel/box.css')}}">
    <link rel="stylesheet" href="{{URL('css/Panel/news.css')}}">
@endsection

@section('content')
    <div class="container news-container">
        <div class="user-details">
            <div class="page-title">
                <h4>جزئیات فایل :</h4>
            </div>
            <div class="container">
                <div class="news-div">
                    <div class="news-image">
                        <img src="{{URL('image/'.$file->image)}}">
                    </div>
                    <div class="news-details">
                        <div class="news-date">
                            <i class="fa fa-calendar"></i>
                            <span>تاریخ : {{jdate($file->file_create_at)->format('%d,%B ,%Y')}}0</span>
                        </div>
                        <div class="news-title">
                            <h1>نام فایل</h1>
                        </div>
                    </div>
                    <div class="news-text">
                        <p>{!! $file->body !!}</p>
                    </div>
                    <div class="news-btn">
                        @if(!Auth::check())
                        <a class="down-btn" href="#">دانلود فایل</a>
                        @else
{{--                            <a class="down-btn" href="{{ url('/file').'/'.$file->download() }}" download="{{$file->file}}">دانلود فایل</a>--}}
                            <a class="down-btn
" href="{{ $file->download() }}" ><i class="fa fa-download"></i>دانلود فایل</a>

                        @endif
                            <a class="cancel-btn" href="{{Route('home.files')}}">بازگشت</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
