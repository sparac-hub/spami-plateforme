@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.map_layers.edit', $map_layer->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.map_layers.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.map_layers.update', $map_layer->id) }}" method="post" class="form-create"
          enctype="multipart/form-data">

        @method('PUT')
        @csrf

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
            <div class="tab-content">
                @foreach(config('translatable.locales') as $k => $locale)
                    <div class="tab-pane @if($k==0) active @endif" id="tab_1_{{$locale}}">

                        {{-- Begin translatable content --}}

                        <h1>{{config('translatable.active_locales.'.$locale.'.name')}}</h1>

                        <div class="form-group">
                            <label>{{__('og.map_layer_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]"
                                   value="{{old($locale.'[name]', $map_layer->translateOrNew($locale)->name)}}">
                        </div>

                        <h1>{{config('translatable.active_locales.'.$locale.'.description')}}</h1>

                        <h1>{{config('translatable.active_locales.'.$locale.'.description')}}</h1>

                        <div class="form-group">
                            <label>{{__('og.map_layer_translations.description')}} </label>
                            <input type="text" class="form-control" name="{{$locale}}[description]"
                                   value="{{old($locale.'[description]', $map_layer->translateOrNew($locale)->description)}}">
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.map_layers.layer')}} *</label>
            <select name="layer" id="layer" class="form-control">
                <option value=""></option>
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.map_layers.is_active')}} </label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if($map_layer->is_active){{'checked'}}@endif class="icheck"> Activé </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(!$map_layer->is_active){{'checked'}}@endif class="icheck"> Désactivé </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>{{__('og.map_layers.order')}} </label>
            <input type="number" class="form-control" name="order" value="{{$map_layer->order}}">
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection


@section('js')
    <script>
        $(document).ready(function () {
            loadWms();
        });

        function loadWms() {
            let capabilities = [];
            $.ajax({
                url: "http://data.medchm.net/geoserver/wms?service=wms&version=1.1.1&request=GetCapabilities",
                success: function (e) {
                    let t = $(e).find("Layer")[0];
                    $.each($(t).find("Layer"), function (e) {
                        let layer = $($(this).find("Name")[0]).text().split(":")[1];
                        let label = $($(this).find("Title")[0]).text().split('_');
                        label = label.join(' ');
                        $('#layer').append(new Option(label.toUpperCase(), layer));
                        if (layer == '{{ old('layer', $map_layer->layer) }}') {
                            $('#layer').val(layer)
                        }
                    });
                }
            });
        }
    </script>
@stop
