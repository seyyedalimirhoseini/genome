@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | نمایش رشته های تحصیلی
@endsection

@section('content')
    <div class="container">
        <div class="table-div">
            <div class="page-title">
                <h4>لیست رشته های تحصیلی :</h4>
            </div>
            @include('UI.Parts.message')
            <div class="course-table">
                <table>
                    <tr>
                        <th class="col-md-1">ردیف</th>
                        <th class="col-md-3">نام رشته تحصیلی</th>

                        <th class="col-md-1">ویرایش</th>
                        <th class="col-md-1">حذف</th>
                    </tr>
                    <?php $i=1 ?>
                    @foreach($fields as $field)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$field->name}}</td>



                            <td><a  href="{{Route('fields.edit',['id'=>$field->id])}}"><i class="fa fa-edit"></i></a></td>
                            <td><a href="{{Route('fields.delete',['id'=>$field->id])}}"><i class="fa fa-close"></i></a></td>
                        </tr>
                    @endforeach

                </table>
            </div>
            {!!  $fields->links() !!}
        </div>
    </div>
@endsection
