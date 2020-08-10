<!DOCTYPE html>

<html lang="fa" dir="rtl">

    <!-- Head -->
    <head>
        @include('Panel.Parts.head')
    </head>

    <!-- Body -->
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- Header -->
        @include('Panel.Parts.header')

        <!-- Container -->
        <div class="page-container">
            <!-- Sidebar -->
            @yield('sidebar')

            <!-- Content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    @yield('content')
                </div>
            </div>

            <!-- Quick Sidebar -->
            {{--@include('Panel.Parts.quick-sidebar')--}}

        </div>

        <!-- Footer -->
        <div class="page-footer">
            @include('Panel.Parts.footer')

            <!-- Quick Nav -->
            {{--@include('Panel.Parts.quick-nav')--}}

            <!-- Scripts -->
            @include('Panel.Parts.scripts')
    </body>

</html>