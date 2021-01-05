@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.menus.edit') }}
@endsection

@section('css')
    <link href="{{asset('back/assets/apps/css/todo-2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/back/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="{{ asset('back/assets/global/css/bootstrap_select.min.css') }}"/>
@stop

@section('content')

    @include('back.menus.partials.widegt-selector')

    {!! set_box_head(__('breadcrumbs.back.menus.edit'), false) !!}

    @include('_common.alerts.messages')


    <form action="{{ route('back.menus.update', $menu->id) }}" method="post" class="form-create">

        @method('PUT')
        @csrf

        <div class="tabbable-line tab-bg">
            <div class="tabbable-line">
                <ul class="nav nav-tabs">
                    @foreach(config('translatable.locales') as $k => $locale)
                        <li class="@if($k==0) active @endif">
                            <a href="#tab_1_{{$locale}}"
                               data-toggle="tab">{{config('translatable.active_locales.'.$locale.'.name')}}
                                <span
                                    class="label label-sm @if($k==0) label-default @else label-danger @endif circle">{{ucfirst($locale)}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-content">

                @foreach(config('translatable.locales') as $k => $locale)
                    <div class="tab-pane @if($k==0) active @endif" id="tab_1_{{$locale}}">

                        {{-- Begin translatable content --}}

                        <h1>{{config('translatable.active_locales.'.$locale.'.name')}}</h1>

                        <div class="form-group">
                            <label>{{__('og.menu_translations.label')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[label]" id="label_{{ $locale }}"
                                   value="{{ old($locale.'.label', $menu->translateOrNew($locale)->label) }}" required>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.menu_translations.slug')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[slug]" id="slug_{{ $locale }}"
                                   value="{{ old($locale.'.slug', $menu->translateOrNew($locale)->slug) }}" required>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.menu_translations.content')}}</label>
                            <textarea class="form-control" name="{{$locale}}[content]"
                                      rows="3">{{ old($locale.'.content', $menu->translateOrNew($locale)->content) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.menu_translations.meta_title')}}</label>
                            <input type="text" class="form-control" name="{{$locale}}[meta_title]"
                                   value="{{ old($locale.'.meta_title', $menu->translateOrNew($locale)->meta_title) }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.menu_translations.meta_description')}}</label>
                            <textarea class="form-control" name="{{$locale}}[meta_description]"
                                      rows="3">{{ old($locale.'.meta_description', $menu->translateOrNew($locale)->meta_description) }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach

            </div>
        </div>

        {{-- Begin common content --}}

        <hr>

        <div class="row">
            <div class="form-group col-md-6">
                <label>{{__('og.menus.menu_group_id')}} *</label>
                <select class="form-control" name="menu_group_id" required>
                    {{ html_select('App\Models\Cms\MenuGroup', 'name', $menu->menu_group_id, $order = null, $except = null) }}
                </select>
            </div>

            <div class="form-group col-md-6">
                <label>{{__('og.menus.parent_id')}}</label>
                <select class="form-control" name="parent_id">
                    {{-- TODO: fill this ! --}}
                    {{-- Filled from an ajax request : Take a look on jQuery code --}}
                </select>
            </div>
        </div>

        {{-- Link type : internal link/external link/module --}}

        <div class="form-group">
            <label>{{__('og.menus.link_type_id')}} *</label>
            <select class="form-control" name="link_type_id" id="link_type_id" required>
                <option value="">Sélectionnez le type de contenu</option>
                @foreach(config('cms.link_types') as $id => $name)
                    <option
                        value="{{$id}}" @if(old('link_type_id', $menu->link_type_id) == $id){{ 'selected' }}@endif>{{$name}}</option>
                @endforeach
            </select>
        </div>

        <div id="link_type">
            @if (old('link_type_id', $menu->link_type_id) == 1)
                @include('back.menus.form.module')
            @elseif (old('link_type_id', $menu->link_type_id) == 2)
                @include('back.menus.form.internal_link')
            @elseif (old('link_type_id', $menu->link_type_id) == 3)
                @include('back.menus.form.external_link')
            @elseif (old('link_type_id', $menu->link_type_id) == 4)
                @include('back.menus.form.menu')
            @endif
        </div>

        <div class="row">
            <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label>{{__('og.menus.is_active')}} *</label>
                <div class="input-group">
                    <div class="icheck-inline">
                        <label>
                            <input type="radio" name="is_active" value="1"
                                   @if($menu->is_active){{ 'checked' }}@endif class="icheck"> Activé </label>
                        <label>
                            <input type="radio" name="is_active" value="0"
                                   @if(!$menu->is_active){{ 'checked' }}@endif class="icheck"> Désactivé </label>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label>{{__('og.menus.icon')}} </label>
                <select class="form-control selectpicker" data-live-search="true" data-size="5" name="icon">
                    <option value=""></option>
                    @foreach(config('fa.icons') as $icon_name => $icon_symbol)
                        {{-- TODO: Test this! --}}
                        <option data-icon="{{$icon_name}}" data-subtext="{{$icon_name}}"
                                value="{{$icon_name}}" @if($menu->icon == $icon_name){{ 'selected' }}@endif>{{$icon_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label>{{__('og.menus.order')}}</label>
                <input type="number" class="form-control" name="order" value="{{ $menu->order }}">
            </div>

            <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label>{{__('og.menus.css_class')}}</label>
                <input type="text" class="form-control" name="css_class" value="{{ $menu->css_class }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

        {{-- End --}}

    </form>

    {!! set_box_foot() !!}

@endsection


@section('js')
    @php
        // $menu_group_id : Used inside view 'get_menus_by_menu_group_id'
        $menu_group_id = $menu->menu_group_id;
    @endphp
    @include('_common.assets.js.menus.get_menus_by_menu_group_id')
    <script src="{{asset('back/assets/apps/scripts/todo-2.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/back/assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('back/assets/global/scripts/bootstrap_select.min.js') }}"></script>
    @include('_common.js.str_slug')
    <script>
        $(document).ready(function () {

            // $(".selectpicker").selectpicker({
            //     iconBase: 'fa',
            //     tickIcon: 'fa-check'
            // });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('select[name="link_type_id"]').on('change', function () {
                var link_type_id = $(this).val();
                var id = {{ $menu->id }}

                $.ajax({
                    method: "POST",
                    url: "{{ route('back.menus.get_form_by_link_type_id') }}",
                    data: {link_type_id: link_type_id, id: id},
                    //dataType: "json",
                    success: function (data) {
                        $('#link_type').html(data);
                    }
                });
            });

            @foreach(config('translatable.locales') as $locale)
            $('#label_{{ $locale }}').on("keyup", function () {
                $('#slug_{{ $locale }}').val(str_slug($(this).val()));
            });
            @endforeach

            {{-- Important! This should be placed at the bottom so the action 'change' (declared previously) will be triggered.  --}}
            @if(isset($menu->module->id))
            {{-- link_type_id = 1 for Module type --}}
            $('#link_type_id').val(1).change();
            @elseif($menu->link_type_id == 3)
            {{-- link_type_id = 3 for external_link --}}
            $('#link_type_id').val(3).change();
                @endif



            var err = '';
            $.validator.addMethod("exitsSlug", function (value, element) {
                var v = false;
                var validator = this;
                var id = {{ $menu->id }};
                var name = element.name;
                var id_elem = element.id;
                $.ajax({
                    url: "{{route('menus.check_slug')}}",
                    type: "post",
                    dataType: "Json",
                    async: false,
                    data: {slug: value, id: id, name: name},
                    success: function (ret) {
                        if (ret.rst === 1) {
                            $('.has-feedback').removeClass('has-error');
                            $('.has-feedback').addClass('has-success');
                            $('.form-control-feedback').removeClass('glyphicon-remove');
                            $('.form-control-feedback').addClass('glyphicon-ok');
                            $('button.block').removeClass('hide');
                            v = true;
                            err = '';
                        } else {
                            var new_value = value + '-{{$menu->id + 1}}';
                            err = 'Le slug existe déjà, vous pouvez entrer ceci: <a rel="' + id_elem + '" href="#?" id="' + id_elem + '_propostion" data-value="' + new_value + '" onclick="javascript:setProp(this);">' + new_value + '</a>';
                            $('.has-feedback').removeClass('has-success');
                            $('.has-feedback').addClass('has-error');
                            $('.form-control-feedback').removeClass('glyphicon-ok');
                            $('.form-control-feedback').addClass('glyphicon-remove');
                            $('button.block').addClass('hide');
                            v = false;

                        }
                    }
                });
                return v;
            }, function (params, element) {
                return err;
            });

            {{--$.validator.setDefaults({
                ignore: ":hidden"
            })--}}

            $('.form-create').validate({
                {{--ignore: ":hidden",--}}
                rules: {
                    'menu_group_id': {
                        required: true
                    },
                    'link_type_id': {
                        required: true
                    },
                    'module_id': {
                        required: true
                    },
                    'internal_link': {
                        required: true
                    },
                    'http_protocol': {
                        required: true
                    },
                    'external_link': {
                        required: true
                    },
                    'is_active': {
                        required: true
                    }
                }
            });

            // langue cms
            var tab_lang = [];

            @foreach(config('translatable.locales') as $k => $locale)
            tab_lang.push('{{ $locale }}');
            @endforeach

            if (tab_lang.length) {
                $.each(tab_lang, function (i, l) {
                    $("#slug_" + l).rules("add", {
                        required: true,
                        exitsSlug: true
                    });
                });
            }

            $('.checkbox_belongs').on('click', function (e) {
                if ($(this).find("input").is(":checked")) {
                    var status = 1;
                } else {
                    var status = 0;
                }
                var widget_id = $(this).find("input").attr('value');
                var menu_id = $(this).find("input").attr('data');
                var url = '{{route('back.widget_menus.update_collection')}}';
                $.ajax({
                    type: 'GET',
                    data: {status: status, widget_id: widget_id, menu_id: menu_id},
                    url: url,
                    dataType: "Json",
                }).done(function (result) {
                    if (result.status == 'success') {
                        var div_id = '#green_or_red_' + result.widget_id;
                        if (result.type == 'delete') {
                            $(div_id).removeClass('todo-tasklist-item-border-green');
                            $(div_id).addClass('todo-tasklist-item-border-red');
                        } else {
                            $(div_id).removeClass('todo-tasklist-item-border-red');
                            $(div_id).addClass('todo-tasklist-item-border-green');
                        }
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
            });

        });

        function setProp(el) {
            $('#' + el.rel).val($('#' + el.id).attr('data-value'));
        }
    </script>

    {{-- check slug if exists --}}
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/jquery.validate.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/localization/messages_".locale().".js") }}"
            type="text/javascript"></script>
@endsection
