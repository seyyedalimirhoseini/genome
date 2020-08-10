@extends('Panel.Admin-Panel.admin-panel')

@section('title')
    مدیریت | نمایش استان ها
@endsection

@section('content')
    <div class="container">
        <div class="table-div">
            <div class="page-title">
                <h4>لیست استان ها :</h4>
            </div>
            @include('UI.Parts.message')
            <div class="course-table">
                <table>
                    <tr>
                        <th class="col-md-1">ردیف</th>
                        <th class="col-md-3">نام استان</th>

                        <th class="col-md-1">ویرایش</th>
                        <th class="col-md-1">حذف</th>
                    </tr>
                    <?php $i=1 ?>
                    @foreach($states as $state)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$state->name}}</td>



                            <td><a  href="{{Route('states.edit',['id'=>$state->id])}}"><i class="fa fa-edit"></i></a></td>
                            <td><a href="{{Route('states.delete',['id'=>$state->id])}}"><i class="fa fa-close"></i></a></td>
                        </tr>
                    @endforeach

                </table>
            </div>
            {!!  $states->links() !!}
        </div>
    </div>
@endsection
