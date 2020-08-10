@extends('UI.master')

@section('title')
  جزئیات خبر
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
                <h4>صفحه خبر :</h4>
            </div>
            <div class="container">
                <div class="news-div">
                    <div class="news-image">
                        <img src="{{URL('image/'.$new->image)}}">
                    </div>
                    <div class="news-details">
                        <div class="news-date">
                            <i class="fa fa-calendar"></i>
                            <span>{{jdate($new->file_create_at)->format('%d,%B ,%Y')}}</span>
                        </div>
                        <div class="news-title">
                            <h1>{{$new->title}}</h1>
                        </div>
                    </div>
                    <div class="news-text">
                        <p>{!! $new->body !!}</p>
                    </div>
                    <div class="news-btn">
                        <a class="cancel-btn" href="{{Route('home.page')}}">بازگشت</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection