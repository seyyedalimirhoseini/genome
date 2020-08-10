@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | لیست کاربران
@endsection

@section('content')
    <div class="container">
        <div class="table-div">
            <div class="page-title">
                <h4>لیست کاربران ثبت نام شده :</h4>
            </div>
            @include('UI.Parts.message')
            <div class="course-table">
                <table>
                    <tr>
                        <th class="col-md-1">ردیف</th>
                        <th class="col-md-3">نام و نام خانوادگی</th>
                        <th class="col-md-2">موبایل</th>
                        <th class="col-md-4">ایمیل</th>
                        <th class="col-md-1">مشخصات</th>
                        <th class="col-md-1">حذف</th>
                    </tr>
                    <?php $i=1 ?>

                        @if( $users && count( $users)>0)
                        @foreach($users as $user)

                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ $user->name}} {{$user->lastname}}    </td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="{{Route('user.details',['id'=>$user->id])}}"><i class="fa fa-list-ul"></i></a></td>
                        <td><a href="{{Route('user.delete',['id'=>$user->id])}}"><i class="fa fa-close"></i></a></td>
                    </tr>

                    @endforeach
                        @endif




                </table>
            </div>
            {!! $users->links() !!}
        </div>
    </div>
@endsection
