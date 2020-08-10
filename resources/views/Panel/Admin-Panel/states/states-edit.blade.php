@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | ویرایش استان
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>ویرایش استان :</h4>
            </div>
            <div class="container">
                <form class="form" action="{{Route('states.update',['id'=>$state->id])}}" method="post">
                    {{csrf_field()}}
                    <div class="input-div">
                        <div class="row">
                            <div class="col-md-6 @if ($errors->has('name')) has-error @endif">
                                <label for="name"><i class="fa fa-asterisk"></i>نام استان :</label>
                                <input type="text" name="name" id="name"  value="{{$state->name}}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('name') }}</small>
                                     </span>
                                @endif
                            </div>



                            <div class="col-md-7 confirm-btn"> <!-- Change -->
                                <button type="submit" class="edit-btn">بروز رسانی استان</button>
                                <a class="cancel-btn" href="{{Route('states.show')}}">انصراف</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection