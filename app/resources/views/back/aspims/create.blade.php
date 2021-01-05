@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.aspims.create', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.aspims.create'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.aspims.store') }}" method="post" class="form-create" enctype="multipart/form-data">

        @csrf
        <input type="hidden" name="menu_id" value="{{ request('menu_id') }}">

        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
                <div class="list-group">
                    <a href="#" class="list-group-item active text-center">
                        <h4 class="glyphicon glyphicon-list"></h4><br/>Information générale
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-map-marker"></h4><br/>Carte Géographique
                    </a>
                </div>
            </div>

            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
                <div class="bhoechie-tab-content active">
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
                                        <label>{{__('og.aspim_translations.name')}} *</label>
                                        <input type="text" class="form-control" name="{{$locale}}[name]"
                                               value="{{ old($locale.'.name') }}" id="name_{{ $locale }}">
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('og.aspim_translations.slug')}} *</label>
                                        <input type="text" class="form-control" name="{{$locale}}[slug]"
                                               value="{{ old($locale.'.slug') }}" id="slug_{{ $locale }}">
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('og.aspim_translations.status')}} *</label>
                                        <input type="text" class="form-control" name="{{$locale}}[status]"
                                               value="{{ old($locale.'.status') }}" id="status_{{ $locale }}"
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('og.aspim_translations.creation_text')}} *</label>
                                        <input type="text" class="form-control" name="{{$locale}}[creation_text]"
                                               value="{{ old($locale.'.creation_text') }}"
                                               id="creation_text_{{ $locale }}"
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('og.aspim_translations.schemas')}} *</label>
                                        <textarea class="form-control summernote" class="form-control"
                                                  name="{{$locale}}[schemas]"
                                                  rows="10">{{ old($locale.'.schemas') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('og.aspim_translations.physical_features')}} *</label>
                                        <textarea class="form-control summernote" class="form-control"
                                                  name="{{$locale}}[physical_features]"
                                                  rows="10">{{ old($locale.'.physical_features') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('og.aspim_translations.ecological_features')}} *</label>
                                        <textarea class="form-control summernote" class="form-control"
                                                  name="{{$locale}}[ecological_features]"
                                                  rows="10">{{ old($locale.'.ecological_features') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('og.aspim_translations.threats_and_pressures')}} *</label>
                                        <textarea class="form-control summernote" class="form-control"
                                                  name="{{$locale}}[threats_and_pressures]"
                                                  rows="10">{{ old($locale.'.threats_and_pressures') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('og.aspim_translations.teritory')}} *</label>
                                        <textarea class="form-control summernote" class="form-control"
                                                  name="{{$locale}}[teritory]"
                                                  rows="10">{{ old($locale.'.teritory') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('og.aspim_translations.mediterranean_importance')}} *</label>
                                        <textarea class="form-control summernote" class="form-control"
                                                  name="{{$locale}}[mediterranean_importance]"
                                                  rows="10">{{ old($locale.'.mediterranean_importance') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('og.aspim_translations.management_body')}} *</label>
                                        <textarea class="form-control summernote" class="form-control"
                                                  name="{{$locale}}[management_body]"
                                                  rows="10">{{ old($locale.'.management_body') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('og.aspim_translations.geographic_position')}} *</label>
                                        <textarea class="form-control summernote" class="form-control"
                                                  name="{{$locale}}[geographic_position]"
                                                  rows="10">{{ old($locale.'.geographic_position') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('og.aspim_translations.meta_title')}} </label>
                                        <input type="text" class="form-control" value="{{ old($locale.'.meta_title') }}"
                                               name="{{$locale}}[meta_title]">
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('og.aspim_translations.meta_description')}} </label>
                                        <textarea class="form-control" name="{{$locale}}[meta_description]"
                                                  rows="3">{{ old($locale.'.meta_description') }}</textarea>
                                    </div>

                                    {{-- End translatable content --}}

                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label>{{__('og.aspims.is_active')}} *</label>
                        <div class="input-group">
                            <div class="icheck-inline">
                                <label>
                                    <input type="radio" name="is_active" value="1" @if(old('is_active') == 1) checked
                                           @endif class="icheck"> Activée </label>
                                <label>
                                    <input type="radio" name="is_active" value="0"
                                           @if(old('is_active') == 0) checked @endif class="icheck"> Désactivée
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>{{__('og.aspims.website')}} *</label>
                        <input type="text" class="form-control" id="website" name="website"
                               value="{{ old('website') }}">
                    </div>

                    <div class="form-group">
                        <label>{{__('og.aspims.website_name')}} *</label>
                        <input type="text" class="form-control" id="website_name" name="website_name"
                               value="{{ old('website_name') }}">
                    </div>

                    <div class="form-group">
                        <label>{{__('og.aspims.included_at')}} *</label>
                        <input type="text" class="form-control" id="included_at" name="included_at"
                               value="{{ old('included_at') }}">
                    </div>

                    <div class="form-group">
                        <label>{{__('og.aspims.total_surface')}} *</label>
                        <input type="number" class="form-control" id="total_surface" name="total_surface"
                               value="{{ old('total_surface') }}">
                    </div>

                    <div class="form-group">
                        <label>{{__('og.aspims.total_surface_marine')}} *</label>
                        <input type="number" class="form-control" id="total_surface_marine" name="total_surface_marine"
                               value="{{ old('total_surface_marine') }}">
                    </div>

                    <div class="form-group">
                        <label>{{__('og.aspims.width')}} *</label>
                        <input type="number" step="0.01" class="form-control" id="width" name="width"
                               value="{{ old('width') }}">
                    </div>

                    <div class="form-group">
                        <label>{{__('og.aspims.countries')}}</label>
                        <select class="form-control" name="countries[]" multiple>
                            <option value="">---</option>
                            @if($countries)
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                            @if(old('countries') == $country->id) selected @endif
                                    >{{ $country->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label>{{__('og.aspims.aspim_category_id')}}</label>
                        <select class="form-control" name="aspim_category_id">
                            <option value="">---</option>
                            @if($aspim_categories)
                                @foreach ($aspim_categories as $aspim_category)
                                    <option value="{{ $aspim_category->id }}"
                                            @if(old('aspim_category_id') == $aspim_category->id) selected @endif
                                    >{{ $aspim_category->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label>{{__('og.aspims.creation_date')}} *</label>
                        <input type="text" class="form-control" id="creation_date" name="creation_date"
                               value="{{ old('creation_date') }}">
                    </div>

                    <div class="form-group">
                        <label>{{__('og.aspim_translations.document')}} *</label>
                        <input type="file" class="form-control" name="document" accept="application/pdf"
                               value="{{ old('document') }}">
                    </div>

                    <div class="form-group">
                        <label>{{__('og.aspim_translations.image')}} *</label>
                        <input type="file" class="form-control" name="image" accept="image/*"
                               value="{{ old('image') }}">
                    </div>

                    <div class="form-group">
                        <label>{{__('og.aspim_translations.gallery')}} </label>
                        <input type="file" class="form-control" name="gallery[]"
                               accept="image/*,video/mp4,video/x-m4v,video/*"
                               multiple>
                    </div>

                </div>
                <div class="bhoechie-tab-content">
                    <div class="form-group">
                        <label>{{__('og.aspims.mapamed_feature_id')}}</label>
                        <select class="form-control" name="mapamed_feature_id">
                            <option value="">---</option>
                            @if($aspim_mapamed_features)
                                @foreach ($aspim_mapamed_features as $key => $value)
                                    <option value="{{ $value }}"
                                            @if(old('mapamed_feature_id') == $value) selected @endif
                                    >{{ $key }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <div id="map" style="height: 500px"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>
            </div>
        </div>
    </form>

    {!! set_box_foot() !!}

@endsection

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
    <link href="{{ asset('back/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <style>
        /*  bhoechie tab */
        div.bhoechie-tab-container {
            z-index: 10;
            background-color: #ffffff;
            padding: 0 !important;
            border-radius: 4px;
            -moz-border-radius: 4px;
            border: 1px solid #ddd;
            margin-top: 20px;
            margin-left: 50px;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            -moz-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            background-clip: padding-box;
            opacity: 0.97;
            filter: alpha(opacity=97);
        }

        div.bhoechie-tab-menu {
            padding-right: 0;
            padding-left: 0;
            padding-bottom: 0;
        }

        div.bhoechie-tab-menu div.list-group {
            margin-bottom: 0;
        }

        div.bhoechie-tab-menu div.list-group > a {
            margin-bottom: 0;
        }

        div.bhoechie-tab-menu div.list-group > a .glyphicon,
        div.bhoechie-tab-menu div.list-group > a .fa {
            color: #5A55A3;
        }

        div.bhoechie-tab-menu div.list-group > a:first-child {
            border-top-right-radius: 0;
            -moz-border-top-right-radius: 0;
        }

        div.bhoechie-tab-menu div.list-group > a:last-child {
            border-bottom-right-radius: 0;
            -moz-border-bottom-right-radius: 0;
        }

        div.bhoechie-tab-menu div.list-group > a.active,
        div.bhoechie-tab-menu div.list-group > a.active .glyphicon,
        div.bhoechie-tab-menu div.list-group > a.active .fa {
            background-color: #5A55A3;
            background-image: #5A55A3;
            color: #ffffff;
        }

        div.bhoechie-tab-menu div.list-group > a.active:after {
            content: '';
            position: absolute;
            left: 100%;
            top: 50%;
            margin-top: -13px;
            border-left: 0;
            border-bottom: 13px solid transparent;
            border-top: 13px solid transparent;
            border-left: 10px solid #5A55A3;
        }

        div.bhoechie-tab-content {
            background-color: #ffffff;
            /* border: 1px solid #eeeeee; */
            padding-left: 20px;
            padding-top: 10px;
        }

        div.bhoechie-tab div.bhoechie-tab-content:not(.active) {
            display: none;
        }
    </style>
@endsection

@section('js')
    <script src="{{asset('back/assets/apps/scripts/todo-2.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/jquery.validate.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/localization/messages_".locale().".js") }}"
            type="text/javascript"></script>
    @include('back._common.js.summernote-with-lfm')
    @include('_common.js.str_slug')

    @include('_common.js.create_slug', [
        'module' => 'aspims',
    ])
    <script src="{{ asset("back/assets/global/plugins/select2/js/select2.full.min.js") }}"
            type="text/javascript"></script>

    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script src="https://elfalem.github.io/Leaflet.curve/src/leaflet.curve.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
    <script>
        var featureIdsLatLng = [];
        var mymap = null;
        var featuresSearch = [];
        var polyline = null;
        var featuresResponse = [];
        var zoomIn = 8;
        var featureId = '{{old('mapamed_feature_id')}}';

        $(function () {
            $("#creation_date").datepicker(
                {
                    format: 'yyyy'
                }
            );
            $("#included_at").datepicker(
                {
                    format: 'yyyy'
                }
            );

            $('#countries').select2();

            $("div.bhoechie-tab-menu>div.list-group>a").on('click', function (e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();
                $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
                $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
                if (mymap == null) {
                    intMap();
                }
            });

            $('select[name=mapamed_feature_id]').on('change', function () {
                var aspim = $(this);
                if (aspim.val() != '') {
                    searchFeatures(aspim.val())
                } else {
                    featureId = null;
                    load();
                }
            });
        });

        function intMap() {
            mymap = L.map("map").setView([36.862499, 10.195556], 4);
            L.tileLayer('//cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png', {
                maxZoom: 5,
                noWrap: true,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(mymap);

            // load data
            load();
        }

        function load() {
            removeLayer();
            $.ajax({
                method: 'GET',
                url: "https://data.medchm.net/geoserver/medbiodivsdi/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=medbiodivsdi:mapamed_spamis_wgs84&maxFeatures=50&outputFormat=application%2Fjson",
                dataType: 'JSON'
            }).success(function (response) {
                featuresResponse = response.features;
                // Load all aspims geojson into the map
                featuresResponse.forEach(feature => {
                    featureIdsLatLng.push(feature);
                    if (featureId == feature.id) {
                        let marker = L.marker([feature.properties.latitude, feature.properties.longitude]).addTo(mymap);

                        let layer = L.geoJSON(feature, {
                            color: "blue",
                        }).addTo(mymap);

                        let {latitude, longitude} = feature.properties;
                        mymap.flyTo([latitude, longitude], zoomIn);
                    }
                });
            });
        }

        function searchFeatures(featureId) {
            removeLayer();
            featuresSearch = featureIdsLatLng.filter(f => featureId === f.id);

            if (featuresSearch.length) {
                const geojson = {
                    type: "FeatureCollection",
                    totalFeatures: featuresSearch.length,
                    features: featuresSearch,
                    crs: {
                        type: "name",
                        properties: {name: "urn:ogc:def:crs:EPSG::4326"}
                    }
                };

                let featureSearch = featuresSearch[0];

                const layer = L.geoJSON(geojson, {
                    color: "blue"
                }).addTo(mymap);

                let {latitude, longitude} = featureSearch.properties;
                let marker = L.marker([featureSearch.properties.latitude, featureSearch.properties.longitude]).addTo(mymap);
                mymap.flyTo([latitude, longitude], zoomIn);
            }

        }

        function removeLayer() {
            mymap.eachLayer(layer => {
                mymap.removeLayer(layer);
            });
            L.tileLayer(
                "https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png",
                {
                    noWrap: true,
                    attribution:
                        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }
            ).addTo(mymap);
        }
    </script>
@endsection
