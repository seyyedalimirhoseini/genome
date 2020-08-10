@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    کاربر | دوره ها
@endsection

@section('content')
    <div class="container">
        <div class="table-div">
            <div class="page-title">
                <h4>لیست کاربران ثبت نام کرده در دوره ها :</h4>
            </div>
            @include('UI.Parts.message')
            <div class="course-table">
                <table>
                    <tr>
                        <th class="col-md-1">ردیف</th>
                        <th class="col-md-3">نام دوره</th>
                        <th class="col-md-2">امتیاز دوره</th>
                        <th class="col-md-2">تاریخ برگزاری</th>
                        <th class="col-md-2">ساعت برگزاری</th>
                        <th  class="col-md-2">نام و نام خانوادگی کاربر</th>
                        <th class="col-md-2">کد تراکنش</th>
                        <th class="col-md-1">حذف</th>
                    </tr>
                    <?php $i = 1 ?>
                    @foreach($users_register_course as $user_register_course)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$user_register_course->title_course}}</td>
                            <td>{{$user_register_course->points}}</td>
                            <td>{{$user_register_course->date}}</td>
                            <td>{{$user_register_course->clock}}</td>
                            <td>{{$user_register_course->name}} {{$user_register_course->lastname}}</td>
                            <td>{{$user_register_course->authority}}</td>
                            <td><a href="{{Route('users.register.course.delete',['id'=>$user_register_course->id])}}"><i
                                            class="fa fa-close"></i></a></td>



                        </tr>
                    @endforeach


                </table>
            </div>

            {!! $users_register_course->links() !!}
        </div>
    </div>
@endsection
