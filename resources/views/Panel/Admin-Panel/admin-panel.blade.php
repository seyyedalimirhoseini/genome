@extends('Panel.master')

@section('title')
    مدیریت
@endsection

@section('css')
    <link rel="stylesheet" href="{{URL('css/Panel/box.css')}}">
<link rel="stylesheet" href="{{URL('css/Panel/sliders.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL('css/persian-datepicker.min.css')}}" />

    <link type="text/css" rel="stylesheet" href="{{URL('dist/bootstrap-clockpicker.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{URL('dist/jquery-clockpicker.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{URL('src/clockpicker.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{URL('src/standalone.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{URL('assets/font/standalone.css')}}" />

@endsection

@section('sidebar')
    @include('Panel.Parts.admin-sidebar')
@endsection

@section('js')
    <script>
        $('.dropdown-user').click(function () {
            if ($(this).attr('class') == "dropdown dropdown-user"){
                $(this).attr('class','dropdown dropdown-user open');
            }
            else if ($(this).attr('class') == "dropdown dropdown-user open"){
                $(this).attr('class','dropdown dropdown-user');
            }
        })
    </script>
    <script src="{{URL('/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL('/assets/js/bootstrap.js')}}"></script>
    <script src="{{URL('/assets/js/bootstrap.js')}}"></script>
    <script src="{{URL('/assets/js/bootstrap.js')}}"></script>
    <script src="{{URL('/assets/js/jquery.js')}}"></script>
    <script src="{{URL('/assets/js/respond.min.js')}}"></script>
    <script src="{{URl('/dist/bootstrap-clockpicker.js')}}"></script>
    <script src="{{URL('/dist/jquery-clockpicker.js')}}"></script>
    <script src="{{URl('/src/clockpicker.js')}}"></script>

    <script>
        CKEDITOR.replace('body' ,{
            filebrowserUploadUrl : '/admin/panel/upload-image',
            filebrowserImageUploadUrl :  '/admin/panel/upload-image'
        });
    </script>
    <script type="text/javascript" src="{{URL('js/persian-date.min.js')}}"></script>
    <script type="text/javascript" src="{{URL('js/persian-datepicker.js')}}"></script>

    <script type="text/javascript">
        $('.observer-example').persianDatepicker({
            observer: true,
            format: 'YYYY/MM/DD',
            altField: '.observer-example-alt'
        });
    </script>

    <script type="text/javascript">
        $('.clockpicker').clockpicker();
    </script>

@endsection