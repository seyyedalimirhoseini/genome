@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت |نمایش شهرستان
@endsection

@section('content')
    <div class="container">
        <div class="table-div">
            <div class="page-title">
                <h4>لیست شهرستان :</h4>
            </div>
            @include('UI.Parts.message')
            <div class="course-table">
                <table>
                    <tr>
                        <th class="col-md-1">ردیف</th>
                        <th class="col-md-3">نام استان</th>
                        <th class="col-md-3">نام شهرستان</th>

                        <th class="col-md-1">ویرایش</th>
                        <th class="col-md-1">حذف</th>
                    </tr>
                    <?php $i=1 ?>
                    @foreach($cities as $city)
                        <tr>
                            <td>{{$i++}}</td>

                            <td>{{$city->state['name']}}</td>
                            <td>{{$city->name}}</td>
                            <td><a  href="{{Route('cities.edit',['id'=>$city->id])}}"><i class="fa fa-edit"></i></a></td>
                            <td><a href="{{Route('cities.delete',['id'=>$city->id])}}"><i class="fa fa-close"></i></a></td>
                        </tr>
                    @endforeach

                </table>
            </div>
            {!!  $cities->links() !!}
        </div>
    </div>
@endsection
