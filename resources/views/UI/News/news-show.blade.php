@extends('UI.master')

@section('title')
    اخبار و اطلاعیه ها
@endsection

@section('css')
    <link rel="stylesheet" href="{{URL('css/Panel/user-details.css')}}">
    <link rel="stylesheet" href="{{URL('css/Panel/box.css')}}">
@endsection

@section('content')
    <div class="container news-container">
        <div class="user-details">
            <div class="page-title">
                <h4>نمایش اخبار :</h4>
            </div>
            @foreach($news as $new)
            <div class="container">
                <div class="box">
                    <div class="row">
                        <div class="col-lg-4 box-image">
                            <img src="{{URL('image/'.$new->image)}}">
                        </div>
                        <div class="col-lg-8 box-details">
                            <div class="details-title">
                                <h2>{{$new->title}}</h2>
                            </div>
                            <div class="details-text">
                                <p>{!! Str::limit($new->body,300)!!}</p> <!-- Change -->
                            </div>
                        </div>
                        <div class="col-lg-8 box-btn">
                            <a class="show-btn" href="{{$new->path()}}"><i class="fa fa-edit"></i> نمایش</a>
                            <span>تاریخ : {{jdate($new->file_create_at)->format('%d,%B ,%Y')}}</span>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
        {{$news->links()}}
    </div>
@endsection