<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>رویداد ملی ژنوم | @yield('title')</title> <!-- Change 2 -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<meta name="author" content=""/>

<!-- Facebook and Twitter integration -->
<meta property="og:title" content=""/>
<meta property="og:image" content=""/>
<meta property="og:url" content=""/>
<meta property="og:site_name" content=""/>
<meta property="og:description" content=""/>
<meta name="twitter:title" content=""/>
<meta name="twitter:image" content=""/>
<meta name="twitter:url" content=""/>
<meta name="twitter:card" content=""/>

{{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<link rel="shortcut icon" href="favicon.ico">

<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">

<!-- Animate.css -->
<link rel="stylesheet" href="{{URL('css/UI/animate.css')}}">
<!-- Icomoon Icon Fonts-->
<link rel="stylesheet" href="{{URL('css/UI/icomoon.css')}}">
<link href="{{URL('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- Bootstrap  -->
<link rel="stylesheet" href="{{URL('css/UI/bootstrap.css')}}">
<!-- Flexslider  -->
<link rel="stylesheet" href="{{URL('css/UI/flexslider.css')}}">
<!-- Magnific Popup -->
<link rel="stylesheet" href="{{URL('css/UI/magnific-popup.css')}}">
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{URL('css/UI/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{URL('css/UI/owl.theme.default.min.css')}}">
<!-- Theme style  -->
<link rel="stylesheet" href="{{URL('css/UI/style.css')}}">

<!-- Login Style -->
<link rel="stylesheet" href="{{URL('css/UI/Auth/login.css')}}">

<!-- Custom Style -->
<link rel="stylesheet" href="{{URL('css/UI/custom.css')}}">

<!-- Modernizr JS -->
<script src="{{URL('js/UI/modernizr-2.6.2.min.js')}}"></script>
<!-- FOR IE9 below -->
<!--[if lt IE 9]>
<script src="{{URL('js/UI/respond.min.js')}}"></script>
<![endif]-->
{{--<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>--}}
{{--<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">--}}
@yield('css')