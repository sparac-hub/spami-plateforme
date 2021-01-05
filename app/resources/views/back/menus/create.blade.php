@extends('back.layouts.app')

@section('css')
    <link href="{{asset('back/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="{{ asset('back/assets/global/css/bootstrap_select.min.css') }}"/>
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.menus.create') }}
@endsection

@section('content')

    {!! set_box_head(__('og.menus.container.create'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.menus.store') }}" method="post" class="form-create">
        @csrf

        <div class="tabbable-line tab-bg">
            <div class="tabbable-line">
                <ul class="nav nav-tabs">
                    @foreach(config('translatable.locales') as $k => $locale)
                        <li class="@if($k==0) active @endif">
                            <a href="#tab_1_{{$locale}}"
                               data-toggle="tab">{{config('translatable.active_locales.'.$locale.'.name')}}
                                <span class="label label-sm @if($k==0) label-default @else label-danger @endif circle">{{ucfirst($locale)}}</span>
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
                                   value="{{ old($locale.'.label') }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.menu_translations.slug')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[slug]" id="slug_{{ $locale }}"
                                   value="{{ old($locale.'.slug') }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.menu_translations.content')}}</label>
                            <textarea class="form-control" name="{{$locale}}[content]"
                                      rows="3">{{ old($locale.'.content') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.menu_translations.meta_title')}}</label>
                            <input type="text" class="form-control" name="{{$locale}}[meta_title]"
                                   value="{{ old($locale.'.meta_title') }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.menu_translations.meta_description')}}</label>
                            <textarea class="form-control" name="{{$locale}}[meta_description]"
                                      rows="3">{{ old($locale.'.meta_description') }}</textarea>
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
                    {{ html_select('App\Models\Cms\MenuGroup', 'name', $menu_group_id, $order = null, $except = null) }}
                </select>
            </div>

            <div class="form-group col-md-6">
                <label>{{__('og.menus.parent_id')}}</label>
                <select class="form-control" name="parent_id">
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
                    <option value="{{$id}}" @if(old('link_type_id') == $id){{ 'selected' }}@endif>{{$name}}</option>
                @endforeach
            </select>
        </div>

        <div id="link_type">
            @if (old('link_type_id') == 1)
                @include('back.menus.form.module')
            @elseif (old('link_type_id') == 2)
                @include('back.menus.form.internal_link')
            @elseif (old('link_type_id') == 3)
                @include('back.menus.form.external_link')
            @elseif (old('link_type_id') == 4)
                @include('back.menus.form.menu')
            @endif
        </div>

        <div class="row">
            <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label>{{__('og.menus.is_active')}} *</label>
                <div class="input-group">
                    <div class="icheck-inline">
                        <label>
                            <input type="radio" name="is_active" value="1" class="icheck"> Activé </label>
                        <label>
                            <input type="radio" name="is_active" value="0" checked class="icheck"> Désactivé </label>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label>{{__('og.menus.icon')}} </label>
                <select class="form-control selectpicker" data-live-search="true" data-size="5" name="icon">
                    <option value=""></option>
                    @foreach(config('fa.icons') as $icon_name => $icon_symbol)
                        <option data-icon="{{$icon_name}}" data-subtext="{{$icon_name}}"
                                value="{{$icon_name}}">{{$icon_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label>{{__('og.menus.order')}}</label>
                <input type="number" class="form-control" name="order" value="0">
            </div>

            <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label>{{__('og.menus.css_class')}}</label>
                <input type="text" class="form-control" name="css_class">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{__('misc.button.create')}}</button>

        {{-- End --}}

    </form>

    {!! set_box_foot() !!}

@endsection

@section('js')
    @include('_common.assets.js.menus.get_menus_by_menu_group_id')
    <script src="{{asset('back/assets/apps/scripts/todo-2.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/jquery.validate.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/localization/messages_".locale().".js") }}"
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

                $.ajax({
                    method: "POST",
                    url: "{{ route('back.menus.get_form_by_link_type_id') }}",
                    data: {link_type_id: link_type_id},
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


            var err = '';
            $.validator.addMethod("exitsSlug", function (value, element) {
                var v = false;
                var validator = this;
                var id = 0;
                var name = element.name;
                var id_elem = element.id;
                $.ajax({
                    url: "{{route('menus.check_slug')}}",
                    type: "post",
                    dataType: "Json",
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
                            var new_value = value + '-' + id + 1;
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

            $('.form-create').validate({
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

            var tab_lang = [];
            @foreach(config('translatable.locales') as $key => $langue)
            tab_lang.push('<?php echo $langue; ?>');
            @endforeach

            /* if (tab_lang.length) {
                $.each(tab_lang, function (i, l) {
                    $("#slug_" + l).rules("add", {
                        required: true,
                        exitsSlug: true
                    });
                });
            } */

        });
    </script>
@endsection
