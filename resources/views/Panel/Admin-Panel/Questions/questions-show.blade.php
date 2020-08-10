@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | سؤالات متداول
@endsection

@section('css')
    <link rel="stylesheet" href="{{URL('css/collapse.css')}}">
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>سؤالات متداول :</h4>
            </div>
            @include('UI.Parts.message')

            <div class="container">
                <div class="collapse-div">
{{--                    @if(count($questions)>0 )--}}
                    @foreach($questions as $question )
                    <div class="collapse-item">
                        <button type="button" class="collapsible">{{$question->question}}</button>
                        <div class="content">
                            <form class="form margin-top-0" action="{{Route('panel.questions.update',['id'=>$question->id])}}" method="post">
                                {{csrf_field()}}
                                <div class="input-div">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="question"><i class="fa fa-asterisk"></i>سؤال :</label>
                                            <input type="text" name="question" id="{{$question->id}}" value="{{$question->question}}" placeholder="سؤال را وارد کنید...">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="answer"><i class="fa fa-asterisk"></i>جواب :</label>
                                            <textarea type="text" name="answer" id="{{$question->id}}" placeholder="جواب را وارد کنید..." >{{$question->answer}}</textarea>
                                        </div>
                                        <div class="col-md-6 confirm-btn">
                                            <button type="submit" class="edit-btn">بروزرسانی</button>
                                            <a class="cancel-btn" href="{{Route('panel.questions.delete',['id'=>$question->id])}}">حذف</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
{{--                        @else--}}
{{--                        <p>موردی برای نمایش وجود ندارد.</p>--}}
{{--                    @endif--}}
                </div>
            </div>
            {!! $questions->links() !!}
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
