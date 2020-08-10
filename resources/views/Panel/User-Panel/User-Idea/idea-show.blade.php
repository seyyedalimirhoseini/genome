@extends('Panel.User-Panel.user-panel')

@section('title')
    کاربر| ایده ها
@endsection

@section('content')
    <div class="container">
        <div class="table-div">
            <div class="page-title">
                <h4>لیست ایده  :</h4>
            </div>
            @include('UI.Parts.message')
            <div class="course-table">


                    <div class="col-md-2 col-lg-offset-9"></div>
                    <a  title="ثبت ایده جدید" href="{{url('user/idea/create')}}"> <img src="{{URL('images/plus.png')}}" style="width: 30px">
                    </a>


                <table>

                       <tr>
                        <th class="col-md-1">ردیف</th>

                        <th class="col-md-2">عنوان ایده</th>
                        <th class="col-md-2">رشته مرتبط</th>
                        <th class="col-md-5">شرح ایده</th>
                        <th class="col-md-5">ویرایش</th>
                        <th class="col-md-1">حذف</th>
                    </tr>
                    <?php $i=1 ?>
                    @foreach($ideas as $idea)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$idea->title}}</td>

                        <td>{{$idea->field['name']}}</td>
                        <td>{!!$idea->description  !!}</td>
                        <td><a  href="{{Route('idea.edit',['id'=>$idea->id])}}"><i class="fa fa-edit"></i></a></td>
                        <td><a href="{{Route('idea.delete',['id'=>$idea->id])}}"><i class="fa fa-close"></i></a></td>
                    </tr>

                    @endforeach
                </table>
                {!! $ideas->links() !!}
            </div>
        </div>
    </div>
@endsection
