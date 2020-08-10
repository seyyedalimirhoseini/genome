<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item">
                <a href="{{Route('user.panel')}}" class="nav-link nav-toggle">
                    <i class="fa fa-user"></i>
                    <span class="title">مشخصات</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{Route('user.courses')}}" class="nav-link nav-toggle">
                    <i class="fa fa-graduation-cap"></i>
                    <span class="title">دوره ها</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link nav-toggle">
                    <i class="fa fa-ellipsis-h"></i>
                    <span class="title">امکانات رویداد</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('idea.create')}}">
                            <span class="title">ثبت ایده</span>
                        </a>
                    </li>
<li class="nav-item">
                        <a class="nav-link" href="{{Route('idea.show')}}">
                            <span class="title">مشاهده ایده</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>