<!--[if lt IE 9]>
<script src="{{ asset('back/assets/global/plugins/respond.min.js')}}"></script>
<script src="{{ asset('back/assets/global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('back/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
{{--<script src="{{ asset('back/assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script> --}}
<script src="{{ asset('back/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('back/assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/counterup/jquery.waypoints.min.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/counterup/jquery.counterup.min.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/amcharts/amcharts/amcharts.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/amcharts/amcharts/serial.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/amcharts/amcharts/pie.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/amcharts/amcharts/radar.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/amcharts/amcharts/themes/light.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/amcharts/amcharts/themes/patterns.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/amcharts/amcharts/themes/chalk.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/amcharts/ammap/ammap.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/amcharts/amstockcharts/amstock.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/flot/jquery.flot.categories.min.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/bootstrap-summernote/summernote.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/bootstrap-summernote/summernote.min.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('back/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"
        type="text/javascript"></script>
@yield('js')
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('back/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('back/assets/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('back/assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('back/assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
@if(!isset($disableFormValidation)) {{-- error on [/fr/admin/menus]: $(...).datepicker is not a function --}}
{{--
TODO: IMPORTANT : DON'T DELETE THIS. It may be used...
    <script src="{{ asset('back/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('back/assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('back/assets/pages/scripts/form-validation.min.js')}}" type="text/javascript"></script>
--}}
@endif
<!-- END THEME LAYOUT SCRIPTS -->
@yield('js_after') {{-- index_nestable : didn't work before app.js --}}
<script>
    $(document).ready(function () {
        $("body").on("keypress", ".str-slug", function (event) {
            var inputValue = event.which;
            {{-- allow "lowercase letters" and "-" --}}
            if (!(inputValue >= 97 && inputValue <= 122) && !(inputValue == 45) && !(inputValue == 32)) {
                event.preventDefault();
            }
        }).on("keyup", ".str-slug", function () {
            var currentString = $(this).val();

            if (currentString.indexOf(' ')) {
                currentString = currentString.replace(' ', '-');
            }

            if (currentString.indexOf('--')) {
                currentString = currentString.replace('--', '-');
            }

            $(this).val(currentString);
        });
    });
</script>
