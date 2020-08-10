@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | ایده ها
@endsection

@section('content')
    <div class="container">
        <div class="table-div">
            <div class="page-title">
                <h4>لیست ایده های ثبت نام شده کاربران :</h4>
            </div>
            <div class="course-table">
                @include('UI.Parts.message')
                <table>
                    <tr>
                        <th class="col-md-1">ردیف</th>
                        <th class="col-md-2">نام کاربر</th>
                        <th class="col-md-2">عنوان ایده</th>
                        <th class="col-md-2">رشته مرتبط</th>
                        <th class="col-md-5">شرح ایده</th>
                        <th class="col-md-1">حذف</th>
                    </tr>
                    <?php $i=1 ?>
                    @foreach($ideas as $idea)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$idea->user['name']}} {{$idea->user['lastname']}}</td>
                        <td>{{$idea->title}}</td>
                        <td>{{$idea->field['name']}}</td>
                        <td>{!! $idea->description !!}</td>
                        <td><a href="{{Route('users.ideas.delete',['id'=>$idea->id])}}"><i class="fa fa-close"></i></a></td>
                    </tr>
                    @endforeach

                </table>
            </div>
            {!! $ideas->links() !!}
        </div>
    </div>
@endsection
