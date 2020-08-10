@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | نمایش فایل ها
@endsection

@section('content')
    <div class="container">
        @include('UI.Parts.message')
        @foreach($files as $file)
        <div class="box">
            <div class="row">
                <div class="col-lg-4 box-image">
                    <img src="{{URL('image/'.$file->image)}}">
                </div>
                <div class="col-lg-8 box-details">
                    <div class="details-title">
                        <h2>{{$file->name}}</h2>
                    </div>
                    <div class="details-text">
                        <p>{!! Str::limit($file->body,100) !!}</p>
                    </div>
                </div>
                <div class="col-lg-8 box-btn">
                    @if($file->publication_status )
                        <a class="show-btn" href="{{url('/admin/file/'.$file->id.'/unactive')}}"><i class="fa fa-newspaper-o"></i> عدم نمایش</a>

                    @else
                        <a class="show-btn" href="{{url('/admin/file/'.$file->id.'/active')}}"><i class="fa fa-newspaper-o"></i>نمایش</a>

                    @endif                    <a class="edit-btn" href="{{Route('file.edit',['id'=>$file->id])}}"><i class="fa fa-edit"></i>ویرایش</a>
                    <a class="delete-btn" href="{{Route('file.delete',['id'=>$file->id])}}"><i class="fa fa-trash"></i>حذف</a>
                    <span>تاریخ :{{jdate($file->file_create_at)->format('%d,%B ,%Y')}}</span>
                </div>
            </div>
        </div>
            @endforeach

    </div>
    {!!  $files->links() !!}

@endsection
