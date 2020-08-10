@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | نمایش اخبار
@endsection

@section('content')
    <div class="container">
        <div class="user-details">
            <div class="page-title">
                <h4>نمایش اخبار :</h4>
            </div>
         @include('UI.Parts.message')
            @foreach($news as $new)
            <div class="container">

                <div class="box">
                    <div class="row">
                        <div class="col-lg-4 box-image">
                            <img src="{{URL('image/'.$new->image)}} "> <!-- Change -->
                        </div>
                        <div class="col-lg-8 box-details">
                            <div class="details-title">
                                <h2>{{$new->title}}</h2>

                            </div>

                            <div class="details-text">
                                <p>{!! Str::limit($new->body,500)!!}</p>

                            </div>
                        </div>
                        <div class="col-lg-8 box-btn">
                            {{--<a class="show-btn" href="{{Route('news.page')}}"><i class="fa fa-newspaper-o"></i> نمایش</a>--}}
                            @if($new->publication_status )
                                <a class="show-btn" href="{{url('/admin/news/'.$new->id.'/unactive')}}"><i class="fa fa-newspaper-o"></i> عدم نمایش</a>

                            @else
                                <a class="show-btn" href="{{url('/admin/news/'.$new->id.'/active')}}"><i class="fa fa-newspaper-o"></i>نمایش</a>

                            @endif
                            <a class="edit-btn" href="{{Route('news.edit',['id'=>$new->id])}}"><i class="fa fa-edit"></i> ویرایش</a>
                            <a class="delete-btn" href="{{Route('news.delete',['id'=>$new->id])}}"><i class="fa fa-trash"></i> حذف</a>
                            <span>تاریخ : {{jdate($new->file_create_at)->format('%d,%B ,%Y')}}</span>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>


                {!!  $news->links() !!}


        </div>

    </div>
@endsection
