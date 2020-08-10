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
                                                    {{--<p class="tag"><span></span>{{$slider->title}}</p> <!-- Change -->--}}
                                                    <h1><a href="#"></a>{{$slider->title}}</h1> <!-- Change -->
                                                    <p>{{$slider->text}}</p> <!-- Change -->
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
                                <h2><span>محوریت ها</span></h2>
                            </div>
                            <div class="tree-box-div">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-xs-6">
                                        <div class="tree-box-item">
                                            <img src="images/img_bg_1.jpg">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-6">
                                        <div class="tree-box-item">
                                            <img src="images/img_bg_2.jpg">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-6">
                                        <div class="tree-box-item">
                                            <img src="images/img_bg_3.jpg">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-xs-6">
                                        <div class="tree-box-item tree-box-item-left">
                                            <img src="images/img_bg_1.jpg">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-6">
                                        <div class="tree-box-item tree-box-item-right">
                                            <img src="images/img_bg_2.jpg">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-xs-6">
                                        <div class="tree-box-item">
                                            <img src="images/img_bg_3.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row row-pb-lg margin-top">
                            <div class="title">
                                <h2><span>رویداد ها</span></h2>
                            </div>
                            <div class="col-md-12 blog-slider">
                                <div class="owl-carousel1">
                                    @foreach($cores as $core)
                                        <div class="item">
                                            <div class="blog-entry">
                                                <div class="blog-img height-400">
                                                    <img class="one-caro-img" src="{{URL('images/'.$core->image)}}">
                                                    <div class="one-caro-textbox" style="">
                                                        <h2 class="margin-bottom-0">{{$core->title}}</h2>
                                                        <p>{!! Str::limit($core->text,500)!!}</p>
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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="title">
                                    <h2><span>تیزر</span></h2>
                                </div>
                                <div class="blog-entry-style animate-box fadeInUp animated">
                                    <div class="blog-img">
                                        @if($poster && count($poster)>0)
                                            @foreach($poster as $poster)
                                                <div class="video colorlib-video"
                                                     style="background-image: url('{{ asset('video/'.$poster->tizer)}}'); max-height: 500px">
                                                    <a href="javascript:show_video()" id="show-video"><i
                                                                class="icon-play4"></i></a>

                                                    @foreach($tizer as $tizer)
                                                        <div class="overlay">
                                                            <video src="{{URL('video/'.$tizer->tizer)}}" controls
                                                                   width="100%" height="100%"
                                                                   style="display: none"></video>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        @else

                                            <div class="video colorlib-video" style=" max-height: 500px">

                                                <a href="javascript:show_video()" id="show-video"><i
                                                            class="icon-play4"></i></a>

                                                @if($tizer && count($tizer)>0)
                                                    @foreach($tizer as $tizer)
                                                        <div class="overlay">
                                                            <video src="{{URL('video/'.$tizer->tizer)}}" controls
                                                                   width="100%" height="100%"
                                                                   style="display: none"></video>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="overlay">
                                                        <video src="" controls width="100%" height="100%"
                                                               style="display: none"></video>
                                                    </div>
                                                @endif
                                            </div>

                                        @endif


                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row margin-top margin-bottom">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="title">
                                        <h2><span>جدیدترین اخبار</span></h2>
                                    </div>
                                    @foreach($news as $new)
                                        <div class="col-md-4">
                                            <div class="blog-entry animate-box">
                                                <div class="blog-img blog-img2">
                                                    <div class="news-box">
                                                        <img src="{{URL('image/'.$new->image)}}">
                                                        <div class="desc text-center">
                                                            {{--<p class="tag"><span>عمومی</span></p>--}}
                                                            <h2 class="head-article"><a
                                                                        href="{{$new->path()}}">{{$new->title}}</a></h2>
                                                            <p>{!! Str::limit($new->body,300)!!}</p>
                                                        </div>
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
                                <h2><span>حامیان</span></h2>
                            </div>
                            <div class="col-md-12 blog-slider last-slider">
                                <div class="owl-carousel10">
                                    <div class="item">
                                        <div class="blog-entry">
                                            <div class="blog-img">
                                                <img src="images/img_bg_1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="blog-entry">
                                            <div class="blog-img">
                                                <img src="images/img_bg_1.jpg" style="width: 100%; height: 100%; border-radius: 50%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="blog-entry">
                                            <div class="blog-img">
                                                <img src="images/img_bg_1.jpg" style="width: 100%; height: 100%; border-radius: 50%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="blog-entry">
                                            <div class="blog-img">
                                                <img src="images/img_bg_1.jpg" style="width: 100%; height: 100%; border-radius: 50%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="blog-entry">
                                            <div class="blog-img">
                                                <img src="images/img_bg_1.jpg" style="width: 100%; height: 100%; border-radius: 50%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="blog-entry">
                                            <div class="blog-img">
                                                <img src="images/img_bg_1.jpg" style="width: 100%; height: 100%; border-radius: 50%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="blog-entry">
                                            <div class="blog-img">
                                                <img src="images/img_bg_1.jpg" style="width: 100%; height: 100%; border-radius: 50%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="blog-entry">
                                            <div class="blog-img">
                                                <img src="images/img_bg_1.jpg" style="width: 100%; height: 100%; border-radius: 50%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="blog-entry">
                                            <div class="blog-img">
                                                <img src="images/img_bg_1.jpg" style="width: 100%; height: 100%; border-radius: 50%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="blog-entry">
                                            <div class="blog-img">
                                                <img src="images/img_bg_1.jpg" style="width: 100%; height: 100%; border-radius: 50%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Start Pagination -->
                {{--<div class="row">--}}
                {{--<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">--}}
                {{--<ul class="pagination">--}}
                {{--<li class="disabled"><a href="#">&laquo;</a></li>--}}
                {{--<li class="active"><a href="#">1</a></li>--}}
                {{--<li><a href="#">2</a></li>--}}
                {{--<li><a href="#">3</a></li>--}}
                {{--<li><a href="#">4</a></li>--}}
                {{--<li><a href="#">&raquo;</a></li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--</div>--}}
                <!-- End Pagination -->
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script>
        const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

        let countDown = new Date('October 23, 2019 00:00:00').getTime(),
            x = setInterval(function () {

                let now = new Date().getTime(),
                    distance = countDown - now;

                document.getElementById('days').innerText = Math.floor(distance / (day)),
                    document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                    document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                    document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

                //do something later when date is reached
                //if (distance < 0) {
                //  clearInterval(x);
                //  'IT'S MY BIRTHDAY!;
                //}

            }, second)
    </script>

    <script>
        function show_video() {
            $('#show-video').hide();
            $('.video').css('background', '#fff');
            $('.overlay').children().show();
        }
    </script>
@endsection
