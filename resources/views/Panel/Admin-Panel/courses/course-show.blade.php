@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | نمایش دوره ها
@endsection

@section('content')
    <div class="container">
        <div class="table-div">
            <div class="page-title">
                <h4>لیست دوره های ثبت شده :</h4>
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
                        <th class="col-md-1">ویرایش</th>
                        <th class="col-md-1">حذف</th>
                    </tr>
                    <?php $i=1 ?>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$course->title}}</td>
                        <td>{{$course->points}}</td>
                        <td>{{$course->date}}</td>
                        <td>{{$course->clock}}</td>
                        <td><a  href="{{Route('courses.edit',['id'=>$course->id])}}"><i class="fa fa-edit"></i></a></td>
                        <td><a href="{{Route('courses.delete',['id'=>$course->id])}}"><i class="fa fa-close"></i></a></td>
                    </tr>
                @endforeach

                </table>
            </div>
            {!!  $courses->links() !!}
        </div>
    </div>
@endsection
