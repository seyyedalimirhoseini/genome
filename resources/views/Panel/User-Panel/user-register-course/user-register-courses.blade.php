@extends('Panel.User-Panel.user-panel')

@section('title')
    کاربر | دوره ها
@endsection

@section('content')
    <div class="container">
        <div class="table-div">
            <div class="page-title">
                <h4>لیست دوره ها :</h4>
            </div>
            @include('UI.Parts.message')
            <div class="course-table">
                <table>
                    <tr>
                        <th class="col-md-1">ردیف</th>
                        <th class="col-md-2">نام دوره</th>
                        <th class="col-md-2">امتیاز دوره</th>
                        <th class="col-md-2">تاریخ برگزاری</th>
                        <th class="col-md-2">ساعت برگزاری</th>
                        <th class="col-md-2">هزینه دوره</th>
                        <th class="col-md-2">کد تراکنش</th>
                        <th class="col-md-2">ثبت نام</th>
                    </tr>
                    <?php $i=1;

                    ?>
                    @foreach($courses as $course)
                        @php
                       $authority= DB::table('register_courses')->where('course_id','=',$course->id)->where('user_id','=',auth()->user()->id)->get();
                        @endphp
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$course->title}}</td>
                        <td>{{$course->points}}</td>
                        <td>{{$course->date}}</td>
                        <td>{{$course->clock}}</td>
                        <td>{{$course->price}}</td>
                        @if($authority  && count($authority ))
                        @foreach($authority as $auth)
                        <td>{{$auth->authority}}</td>
                        @endforeach
                            @else
                            <td></td>
                        @endif
                        <form class="form margin-top-0" action="{{Route('pending',['id'=>$course->id])}}" method="post">
{{--                        <form class="form margin-top-0" action="" method="post">--}}
                                {{csrf_field()}}

                                <?php
                            $English_Number = str_replace(

                                array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'),
                                array('0','1','2','3','4','5','6','7','8','9'),
                                $course->date
                            );
                            ?>
{{--                    @dd(jdate(\Carbon\Carbon::now())->format('H:i'))--}}
{{--                        @dd(jdate(\Carbon\Carbon::now())->format('Y/m/d'))--}}
                            @if(jdate(\Carbon\Carbon::now())->format('Y/m/d') < $English_Number  &&  jdate(\Carbon\Carbon::now())->format('H:i') < $course->clock)

                                @if($course->registercourses()->where('status',1)->where('user_id',Auth::user()->id)->count()>0);
                                <td><a href=""><i class="fa fa-close"></i></a></td>
                                @else
                                    <td> <button type="submit" class="login-btn"><i class="fa fa-check active-check"></i></button></td>

                                @endif

                            @elseif( jdate(\Carbon\Carbon::now())->format('Y/m/d') < $English_Number && jdate(\Carbon\Carbon::now())->format('H:i') == $course->clock)

                                @if($course->registercourses()->where('status',1)->where('user_id',Auth::user()->id)->count()>0);
                                <td><a href=""><i class="fa fa-close"></i></a></td>
                                @else
                                    <td> <button type="submit" class="login-btn"><i class="fa fa-check active-check"></i></button></td>

                                @endif
                            @elseif( jdate(\Carbon\Carbon::now())->format('Y/m/d') < $English_Number && jdate(\Carbon\Carbon::now())->format('H:i') > $course->clock)

                                @if($course->registercourses()->where('status',1)->where('user_id',Auth::user()->id)->count()>0);
                                <td><a href=""><i class="fa fa-close"></i></a></td>
                                @else
                                    <td> <button type="submit" class="login-btn"><i class="fa fa-check active-check"></i></button></td>

                                @endif
                            @elseif( jdate(\Carbon\Carbon::now())->format('Y/m/d') == $English_Number && jdate(\Carbon\Carbon::now())->format('H:i') == $course->clock)

                                @if($course->registercourses()->where('status',1)->where('user_id',Auth::user()->id)->count()>0);
                                <td><a href=""><i class="fa fa-close"></i></a></td>
                                @else
                                    <td> <button type="submit" class="login-btn"><i class="fa fa-check active-check"></i></button></td>

                                @endif
                            @elseif( jdate(\Carbon\Carbon::now())->format('Y/m/d') == $English_Number && jdate(\Carbon\Carbon::now())->format('H:i') < $course->clock)

                                @if($course->registercourses()->where('status',1)->where('user_id',Auth::user()->id)->count()>0);
                                <td><a href=""><i class="fa fa-close"></i></a></td>
                                @else
                                    <td> <button type="submit" class="login-btn"><i class="fa fa-check active-check"></i></button></td>

                                @endif
                            @elseif( jdate(\Carbon\Carbon::now())->format('Y/m/d') == $English_Number && jdate(\Carbon\Carbon::now())->format('H:i') > $course->clock)

                                <td  style="color: red"  title="زمان ثبت نام به اتمام رسیده است."><i class="fa fa-times-circle"></i></td>
                            @elseif($course->registercourses()->where('status',1)->where('user_id',Auth::user()->id)->count()>0)
                                <td><a href=""><i class="fa fa-close"></i></a></td>

                            @else
                                <td  style="color: red"  title="زمان ثبت نام به اتمام رسیده است."><i class="fa fa-times-circle"></i></td>


                            @endif


                        </form>

                    </tr>
                @endforeach



                </table>
            </div>

            {!! $courses->links() !!}
        </div>
    </div>

@endsection

