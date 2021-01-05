@extends('back.layouts.app')

@section('css')
    <link href="{{ asset('/back/assets/global/plugins/jquery-nestable/jquery.nestable.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/back/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <style>
        .dd-handle {
            height: 35px;
        }
    </style>
    {{--
    <link href="{{ asset('/back/assets/global/plugins/jstree/dist/themes/default/style.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <style>
        .vakata-context li a {
            padding-left: 25px !important;
        }
    </style>
    --}}
@stop

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.menus.index') }}
@endsection

@section('content')

    @include('back._common.alerts.messages')

    @foreach($menuGroups->chunk(2) as $chunk)

        <div class="row">
            @foreach($chunk as $chunk_part)
                <div class="col-md-6">
                    {!! set_box_head($chunk_part->name, false) !!}

                    <a href="{{ route('back.menus.create', ['menu_group_id' => $chunk_part->id]) }}"
                       class="btn blue btn-outline btn-block">
                        <i class="fa fa-plus"></i>
                        Ajouter Un Elèment
                    </a>

                    <div class="dd" id="nestable_list_{{ $chunk_part->id }}">

                        <ol class="dd-list">
                            @php($menus_tree = buildTree($chunk_part->menus->sortBy('order')->toArray()))

                            @include('back.menus.partials.nestable_menu_children')
                        </ol>
                    </div>


                    {!! set_box_foot() !!}
                </div>
            @endforeach
        </div>

    @endforeach

@endsection


@section('js_after')
    <script src="{{ asset('/back/assets/global/plugins/jquery-nestable/jquery.nestable.js') }}"
            type="text/javascript"></script>
    {{--
    <script src="{{ asset('/back/assets/pages/scripts/ui-nestable.js') }}" type="text/javascript"></script>
    --}}
    <script src="{{ asset('/back//assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"
            type="text/javascript"></script>
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var UINestable = function () {

            var updateOutput = function (e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                        {{-- console.log(window.JSON.stringify(list.nestable('serialize'))) --}}
                    var menuGroupData = window.JSON.stringify(list.nestable('serialize'));
                    $.ajax({
                        url: '{{ route('back.menu-groups.update-order') }}',
                        data: {
                            menu_group_data: menuGroupData
                        },
                        dataType: 'JSON',
                        method: 'POST'
                    }).done(function (resp) {
                        if (resp.status == 'success') {
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
                        }
                    });
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };

            return {
                //main function to initiate the module
                init: function () {

                    @foreach($menuGroups as $menuGroup)
                    {{ '// activate Nestable for list '. $menuGroup->id }}
                    $('#nestable_list_{{ $menuGroup->id }}').nestable({
                        group: 1
                    }).on('change', updateOutput);
                    @endforeach

                    {{--
                    // output initial serialised data
                    @foreach($grouped_menus as $grouped_menu)
                    // updateOutput($('#nestable_list_{{ $grouped_menu->first()->menu_group_id }}').data('output', $('#nestable_list_{{ $grouped_menu->first()->menu_group_id }}_output')));
                    @endforeach
                    --}}

                    $('#nestable_list_menu').on('click', function (e) {
                        var target = $(e.target),
                            action = target.data('action');
                        if (action === 'expand-all') {
                            $('.dd').nestable('expandAll');
                        }
                        if (action === 'collapse-all') {
                            $('.dd').nestable('collapseAll');
                        }
                    });
                }
            };
        }();

        $(document).ready(function () {
            UINestable.init();

            {{-- Toggle menu status --}}
            $('.toggle-status').on('click', function (e) {
                var el = $(this);
                var id = el.attr('id');
                $.ajax({
                    url: '{{ route('back.menus.toggle-status') }}',
                    data: {
                        id: id
                    },
                    dataType: 'JSON',
                    method: 'POST'
                }).done(function (resp) {
                    if (resp.status == 'success') {
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

                        if (resp.is_active == 1) {
                            el.removeClass('btn-default').addClass('btn-primary');
                        } else {
                            el.removeClass('btn-primary').addClass('btn-default');
                        }
                        toastr.success("{{ __('og.alert.success') }}", "{{ __('og.alert_title.congratulations') }}");
                    }
                });
            });
        });

        {{-- Authorize user to click the buttons inside nestable elements --}}
        $('.dd a').on('mousedown', function (event) {
            event.preventDefault();
            return false;
        });

    </script>
@stop
