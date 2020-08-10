@extends('UI.master')

@section('title')
    سؤالات متداول
@endsection

@section('css')
    <link rel="stylesheet" href="{{URL('css/Panel/user-details.css')}}">
    <link rel="stylesheet" href="{{URL('css/Panel/box.css')}}">
    <link rel="stylesheet" href="{{URL('css/collapse.css')}}">
@endsection

@section('content')
    <div class="container news-container">
        <div class="user-details">
            <div class="page-title">
                <h4>سؤالات متداول :</h4>
            </div>
            <div class="container">
                <div class="collapse-div">
                    @foreach($questions as $question)
                    <div class="collapse-item">
                        <button type="button" class="collapsible">{{$question->question}}</button>
                        <div class="content">
                            <p>{{$question->answer}}</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight){
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        }
    </script>
@endsection
