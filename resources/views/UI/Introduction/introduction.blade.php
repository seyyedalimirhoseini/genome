@extends('UI.master')

@section('sidebar')
@endsection

@section('content')
    <div id="colorlib-page">
        <div id="colorlib-main">

            <aside id="colorlib-hero" class="">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach($sliders as $slider)
                            <li class="">
                                <img src="{{URL('images/'.$slider->image)}}">
                                <div class="overlay"></div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12 slider-text">
                                            <div class="slider-text-inner">
                                                <div class="desc">
                                                    <h1><a href="#"></a>{{$slider->title}}</h1>
                                                    <p>{{$slider->text}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </aside>

            <div class="colorlib-blog">
                <div class="container-wrap">
                    <div class="row">

                        <div class="row row-pb-lg margin-top">
                            <div class="title">
                                <h2><span>رویداد ها</span></h2>
                            </div>
                            <div class="col-md-12 blog-slider">
                                <div class="owl-carousel4">
                                    @foreach($cores as $core)
                                        <div class="item">
                                            <div class="blog-entry">
                                                <div class="blog-img" style="background-image: url({{ asset('images/'.$core->image)}});">
                                                    <div class="desc text-center">
                                                        <h2 class="head-article"><a href="">{{ $core->title }}</a></h2>
                                                        <p>{{ $core->text }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row row-pb-lg">
                            <div class="title">
                                <h2><span>سخنرانان</span></h2>
                            </div>
                            <div class="col-md-12 blog-slider">
                                <div class="owl-carousel4">
                                    @foreach($organizers as $organizer)
                                        <div class="item">
                                            <div class="blog-entry">
                                                <div class="blog-img" style="background-image: url({{ asset('images/'.$organizer->image)}});">
                                                    <div class="desc text-center">
                                                        <h2 class="head-article"><a href="">{{ $organizer->title }}</a></h2>
                                                        <p>{{ $organizer->text }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>

                        <div class="row row-pb-lg">
                            <div class="title">
                                <h2><span>شورای علمی</span></h2>
                            </div>
                            <div class="col-md-12 blog-slider">
                                <div class="owl-carousel4">
                                    @foreach($committees as $committee)
                                        <div class="item">
                                            <div class="blog-entry">
                                                <div class="blog-img" style="background-image: url({{ asset('images/'.$committee->image)}});">
                                                    <div class="desc text-center">
                                                        <h2 class="head-article"><a href="">{{ $committee->title }}</a></h2>
                                                        <p>{{ $committee->text }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection