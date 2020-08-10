<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item ">
                <a href="{{Route('admin.panel')}}" class="nav-link nav-toggle">
                    <i class="fa fa-user"></i>
                    <span class="title">مشخصات</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{Route('users.list')}}" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">لیست کاربران</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{Route('users.register.course')}}" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title"> لیست کاربران ثبت نام کرده در دوره ها</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{Route('users.ideas')}}" class="nav-link nav-toggle">
                    <i class="fa fa-lightbulb-o"></i>
                    <span class="title">ایده های کاربران</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link nav-toggle">
                    <i class="fa fa-graduation-cap"></i>
                    <span class="title">دوره ها</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('courses.create')}}">
                            <span class="title">افزودن دوره</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('courses.show')}}">
                            <span class="title">نمایش دوره ها</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link nav-toggle">
                    <i class="fa fa-cog"></i>
                    <span class="title">تنظیمات صفحات سایت</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link nav-toggle">
                            <span class="title">فایل های آموزشی</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('file.create')}}">
                                    <span class="title">افزودن فایل</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('files.show')}}">
                                    <span class="title">نمایش فایل ها</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link nav-toggle">
                            <span class="title">اخبار و اطلاعیه ها</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('news.create')}}">
                                    <span class="title">افزودن خبر</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('news.show')}}">
                                    <span class="title">نمایش اخبار</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link nav-toggle">
                            <span class="title">سؤالات متداول</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('panel.questions.create')}}">
                                    <span class="title">افزودن سؤال</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('panel.questions.show')}}">
                                    <span class="title">نمایش سؤالات</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{Route('aboutus.show')}}" class="nav-link nav-toggle">
                            <span class="title">ارتباط با ما</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link nav-toggle">
                    <i class="fa fa-cog"></i>
                    <span class="title">تنظیمات نمایش سایت</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">
                            <span class="title">اسلایدرها</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('sliders.show')}}">
                                    <span class="title">اسلایدر اصلی</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('events.show')}}">
                                    <span class="title">اسلایدر رویداد ها</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('speakers.show')}}">
                                    <span class="title">اسلایدر سخنرانان</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{Route('committees.show')}}">
                                    <span class="title">اسلایدر شورای علمی</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('tizer.show')}}">
                            <span class="title">تیزر</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link nav-toggle">
                    <i class="fa fa-flag"></i>
                    <span class="title">استان ها</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('states.create')}}">
                            <span class="title">افزودن استان</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('states.show')}}">
                            <span class="title">نمایش استان ها</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link nav-toggle">
                    <i class="fa fa-flag"></i>
                    <span class="title">شهرستان ها</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('cities.create')}}">
                            <span class="title">افزودن شهرستان</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('cities.show')}}">
                            <span class="title">نمایش شهرستان</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link nav-toggle">
                    <i class="fa fa-book"></i>
                    <span class="title">رشته تحصیلی</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('fields.create')}}">
                            <span class="title">افزودن رشته تحصیلی</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('fields.show')}}">
                            <span class="title">نمایش رشته تحصیلی</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
