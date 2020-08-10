@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | سؤالات متداول
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>سؤالات متداول :</h4>
            </div>
            @include('UI.Parts.message')

            <div class="container">
                <form class="form margin-top-0" action="{{Route('panel.questions.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="input-div">
                        <div class="row">
                            <div class="col-md-12 @if ($errors->has('question')) has-error @endif">
                                <label for="question"><i class="fa fa-asterisk"></i>سؤال :</label>
                                <input type="text" name="question" id="question" value="{{old('question')}}" placeholder="سؤال را وارد کنید...">
                                @if ($errors->has('question'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('question') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-12 @if ($errors->has('answer')) has-error @endif">
                                <label for="answer"><i class="fa fa-asterisk"></i>جواب :</label>
                                <textarea type="text" name="answer" id="answer" placeholder="جواب را وارد کنید..." >{{old('answer')}}</textarea>
                                @if ($errors->has('answer'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('answer') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 confirm-btn">
                                <button type="submit" class="login-btn">تأیید</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
