@extends('back.layouts.app')


@section('css')
    @include('back._common.css.datatables')
    <link href="{{ asset('/back/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/back/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/back/assets/global/plugins/jquery-minicolors/jquery.minicolors.css') }}" rel="stylesheet"
          type="text/css"/>

    <style type="text/css">
        #map {
            width: 100%;
            height: 480px;
        }
    </style>
@stop

@section('content')

    {!! set_box_head('Parameters by Group', false) !!}

    @include('back._common.alerts.messages')

    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3">
            <ul class="nav nav-tabs tabs-left">
                @foreach($parameters->groupBy('parameter_group_id') as $parameter_group_id => $current_group)
                    <li @if($parameter_group_id==1){!! 'class="active"' !!}@endif>
                        <a href="#tab_params_{{ $parameter_group_id }}"
                           data-toggle="tab">{{ $current_group->first()->parameter_group->name }}
                            @if(env('DEBUG_ME') == true)
                                <span title="parameter_group_id">[{{ $parameter_group_id }}]</span>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <div class="tab-content">
                @foreach($parameters->groupBy('parameter_group_id') as $parameter_group_id => $current_group)
                    <div class="tab-pane @if($parameter_group_id==1){{ 'active' }}@else{{ 'fade' }}@endif"
                         id="tab_params_{{ $parameter_group_id }}">
                        @include('back.parameters.partials.group_reference.'.$current_group->first()->parameter_group->reference)
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {!! set_box_foot() !!}

@endsection



@section('js')
    <script src="{{ asset('/back//assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/back/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/back/assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/back/assets/pages/scripts/components-color-pickers.min.js') }}"
            type="text/javascript"></script>
    <script>

        $(document).ready(function () {
            $.minicolors = {
                defaults: {
                    animationSpeed: 50,
                    animationEasing: 'swing',
                    change: null,
                    changeDelay: 0,
                    control: 'hue',
                    defaultValue: '',
                    format: 'hex',
                    hide: null,
                    hideSpeed: 100,
                    inline: false,
                    keywords: '',
                    letterCase: 'lowercase',
                    opacity: false,
                    position: 'bottom left',
                    show: null,
                    showSpeed: 100,
                    theme: 'default',
                    swatches: []
                }
            };

            $('input[name="smtpauth"]').on('click', function () {
                if ($(this).is(':checked')) {
                    $('input[name="mail_password"]').removeAttr('disabled');
                } else {
                    $('input[name="mail_password"]').attr('disabled', true);
                }
            })


            $('.update-parameters').on('click', function (e) {

                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: $(this).closest('form').attr('action'),
                    data: $(this).closest('form').serialize()
                })
                    .done(function (data) {
                        if (data.result == 'success')
                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "positionClass": "toast-top-right",
                                "onclick": null,
                                "showDuration": "1000",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        toastr.success("{{ __('og.alert.success') }}", "{{ __('og.alert_title.congratulations') }}");
                    });

            });

        });
    </script>

    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVZlAeltafSnPhw608RhtLE29-0MjOPUI"></script>
    <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
    @include('back.media_files.partials.lfm_file_picker')
    <script>
        // Get element references
        var confirmBtn = document.getElementById('confirmPosition');
        var onClickPositionView = document.getElementById('onClickPositionView');

        // Initialize locationPicker plugin
        var lp = new locationPicker('map', {
            @if(get_cached_parameters('map_lat') && get_cached_parameters('map_lng'))
            lat: "{{get_cached_parameters('map_lat')}}",
            lng: "{{get_cached_parameters('map_lng')}}",
            @else
            setCurrentPosition: true, // You can omit this, defaults to true
            @endif
        }, {
            zoom: 15 // You can set any google map options here, zoom defaults to 15
        });

        // Listen to button onclick event
        confirmBtn.onclick = function () {
            // Get current location and show it in HTML
            var location = lp.getMarkerPosition();
            $('input[name="map_lng"]').val(location.lng);
            $('input[name="map_lat"]').val(location.lat);
        };

    </script>

    @include('back._common.datatables.toggleStatusJs', [
       'route' => 'back.parameters.index'
   ])
@append
