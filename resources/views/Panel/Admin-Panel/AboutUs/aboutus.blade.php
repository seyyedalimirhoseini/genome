@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | ارتباط با ما
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>ارتباط با ما :</h4>
            </div>
            @include('UI.Parts.message')

            <div class="container">
                @foreach($about as $item)
                <form class="form margin-top-0" action="{{Route('aboutus.update',['id'=>$item->id])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="input-div">
                        <div class="row">
                            <div class="col-md-6 @if ($errors->has('name')) has-error @endif">
                                <label for="name"><i class="fa fa-asterisk"></i>نام شرکت :</label>
                                <input type="text" name="name" id="name" value="{{$item->name}}" placeholder="نام شرکت را وارد کنید...">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('name') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="phone">شماره تماس :</label>
                                <input type="text" name="phone" id="phone" value="{{$item->phone}}" placeholder="شماره تماس را وارد کنید...">
                            </div>
                            <div class="col-md-12">
                                <label for="address">آدرس :</label>
                                <input type="text" name="address" id="address" value="{{$item->address}}" placeholder="آدرس را وارد کنید...">
                            </div>
                            <div class="col-md-12 @if ($errors->has('text')) has-error @endif">
                                <label for="text"><i class="fa fa-asterisk"></i>درباره شرکت :</label>
                                <textarea type="text" name="text" id="text" placeholder="توضیحاتی در مورد شرکت وارد کنید..." >{{$item->text}}</textarea>
                                @if ($errors->has('text'))
                                    <span class="invalid-feedback" role="alert">
                                      <small style="color: red">{{ $errors->first('text') }}</small>
                                     </span>
                                @endif
                            </div>
                            <div class="col-md-6 confirm-btn">
                                <button type="submit" class="edit-btn">بروز رسانی</button>
                            </div>
                        </div>
                    </div>
                </form>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
