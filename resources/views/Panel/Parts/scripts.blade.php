<!--[if lt IE 9]>
<script src="{{URL('js/Panel/respond.min.js')}}"></script>
<script src="{{URL('js/Panel/excanvas.min.js')}}"></script>
<script src="{{URL('js/Panel/ie8.fix.min.js')}}"></script>
<![endif]-->

<!-- Event Plugins -->
<script src="{{URL('js/Panel/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{URL('js/Panel/bootstrap.js')}}" type="text/javascript"></script>
<script src="{{URL('js/Panel/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{URL('js/Panel/jquery.slimscroll.js')}}" type="text/javascript"></script>
<script src="{{URL('js/Panel/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{URL('js/Panel/bootstrap-switch.js')}}" type="text/javascript"></script>

<!-- BEGIN PAGE LEVEL PLUGINS -->
{{--<script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js"--}}
        {{--type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/horizontal-timeline/horizontal-timeline.js"--}}
        {{--type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js"--}}
        {{--type="text/javascript"></script>--}}
{{--<script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>--}}
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{URL('js/Panel/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{--<script src="{{URL('js/Panel/dashboard.min.js')}}" type="text/javascript"></script>--}}
<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{URL('js/Panel/layout.min.js')}}" type="text/javascript"></script>
<script src="{{URL('js/Panel/demo.min.js')}}" type="text/javascript"></script>
<script src="{{URL('js/Panel/quick-sidebar.min.js')}}" type="text/javascript"></script>
<script src="{{URL('js/Panel/quick-nav.min.js')}}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script type="text/javascript" src="{{URL('/js/UI/sweetalert.min.js')}}"></script>

@include('sweet::alert')
@yield('js')
