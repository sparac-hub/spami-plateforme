@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('header_interne')
    <ul class="box_type_display">
        <li class="list {{ (\Route::currentRouteName() == "front.routes.index")?'active':'' }}">
            <a href="{{ route('front.routes.index', $menu->slug) }}">{{__('og.button.list')}}</a>
        </li>
        <li class="carte {{ (\Route::currentRouteName() == "front.routes.map")?'active':'' }}">
            <a href="{{ route('front.routes.map', $menu->slug) }}">{{__('og.button.map')}}</a>
        </li>
    </ul>
@endsection

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
    {{--    <link rel="stylesheet" href="{{ asset(front_dir().'/assets/css/bootstrap-slider.css') }}">--}}
    <style>
        .bloc_right_map ul li a.active {
            background: #1076b0;
        }
    </style>
@endsection

@section('main_content')
    <section class="wrap_content_pages">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    @include(front_dir().'.layouts.app_partials.breadcrumbs')

                    @include(front_dir().'.aspims.partials.filter_map')
                </div>
            </div>
        </div>
        <div class="container_map">
            <div class="container-fluid no-padding">
                @if(config('cms.layersOws')['display'])
                    <button type="button" class="toggle_bloc_map drawer-toggle drawer-hamburger"><span
                            class="drawer-hamburger-icon"></span></button>
                    <div class="back-to-top"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></div>
                    <div class="bloc_right_map bloc_left_map_aspim">
                        <h2 class="title_couche">{{ __('og.programs.title_content_map') }}</h2>
                        <ul class="">
                            @php
                                $cpt = 0;
                            @endphp
                            @foreach($layers as $key=>$layer)
                                <li>
                                    <h3>
                                        <a class="content_map"
                                           href="javascript:void(0)"
                                           data-id="{{ $layer->layer }}">{{ $layer->name }}</a>
                                        {{-- <div class="btn-group"
                                              style="position: absolute;right: 10px;"
                                              role="group"
                                              aria-label="Button group with nested dropdown">
                                             <div class="btn-group" role="group">
                                                 <button id="btn-group-drop-{{ $cpt }}" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                     <img src="https://data.medchm.net/img/map/ALB_icon_opacidad.svg" title="Change opacity">
                                                 </button>
                                                 <div class="g-custom-range-opacity dropdown-menu" aria-labelledby="btn-group-drop-{{ $cpt }}">
                                                     <label>Opacity (<span>70</span>%)
                                                         <input class="custom-range-opacity" id="range-opacity-{{ $cpt }}" type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="70"/>
                                                     </label>
                                                 </div>
                                             </div>
                                         </div>--}}
                                    </h3>
                                </li>
                                @php
                                    $cpt++;
                                @endphp
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-{{ (config('cms.layersOws')['display'])?'12':12 }} no-padding col_map_jumlage">
                    <div id="map" style="height: 700px;">
                        <div class="bloc_infos_map" style="display: none">
                            <div class="title_info_map"></div>
                            <p class="text_info_map"></p>
                            <a href="javascript:void(0)" class="link_liste">
                                <i class="zmdi zmdi-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    @php
        $aspimsJs = [];
    @endphp
    @foreach($aspims as $aspim)
        @php(array_push($aspimsJs, ['id'=>$aspim->mapamed_feature_id, 'title'=>$aspim->name, 'text'=>$aspim->creation_text, 'link'=>front_show($aspim)]))
    @endforeach
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    {{--    <script src="https://elfalem.github.io/Leaflet.curve/src/leaflet.curve.js"></script>--}}
    <script src="{{asset('front/assets/js/vendors/leaflet.curve.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
    {{--    <script src="{{ asset(front_dir().'/assets/js/vendors/bootstrap-slider.js') }}"></script>--}}
    <script>

        "use strict";

        var featureIdsLatLng = [],
            mymap = null,
            opacity = 0.7,
            featuresSearch = [],
            polyline = null,
            featuresResponse = [],
            zoomIn = 10,
            existFilter = false,
            wmsLoaded = false,
            layersTab = [],
            capabilities = [],
            $wmsMapLayer = [],
            $wmsMapLayers = [],
            info = L.control(),
            initPointContentLayers = [38.074914, 14.410262],
            wmsBaseUrl = "https://data.medchm.net/geoserver/ows?",
            layersOws = [];
        var aspims = @json($aspimsJs);

        $(function () {
            intMap();
            searchInSelect();
            $('#aspim').on('change', function () {
                var aspim = $(this);
                showPopup();

                if (parseInt(aspim.val())) {
                    getAspim(aspim.val());
                } else {
                    load(false);
                }
            });
            setContentMap(); // customRangeOacity();
        });

        function intMap() {
            mymap = L.map("map").setView([36.862499, 10.195556], 4);
            L.tileLayer('//cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png', {
                maxZoom: 18,
                noWrap: true,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(mymap); // control that shows state info on hover

            addInfo(); // load data

            load(false);
        }

        function load(showAllPinOnFirstLoad) {
            if (typeof showAllPinOnFirstLoad == 'undefined') {
                showAllPinOnFirstLoad = true;
            }

            removeLayer();
            showPopup();

            if (typeof featuresResponse !== 'undefined' && featuresResponse.length > 0 && typeof existFilter !== 'undefined' && existFilter) {
                // Load all aspims geojson into the map
                var latLngArray = [];
                featuresResponse.forEach(function (feature) {
                    latLngArray.push([feature.properties.LATITUDE, feature.properties.LONGITUDE]);
                    featureIdsLatLng.push(feature); // if (showAllPinOnFirstLoad) {

                    var marker = L.marker([feature.properties.LATITUDE, feature.properties.LONGITUDE]).on('click', handleMarkerClickEvent).addTo(mymap);

                    if (latLngArray.length > 1) {
                        var layer = L.geoJSON(feature, {
                            color: "blue"
                        }).addTo(mymap);
                    } else {
                        mymap.flyTo(latLngArray[0], 6);
                    } // }

                });

                if (latLngArray.length > 1) {
                    mymap.fitBounds([latLngArray]);
                }
            } else {
                $.ajax({
                    method: 'GET',
                    url: "{!! config('sparac.map_url') !!}",
                    dataType: 'JSON'
                }).done(function (response) {
                    featuresResponse = response.features; // Load all aspims geojson into the map

                    var latLngArray = [];
                    featuresResponse.forEach(function (feature) {
                        latLngArray.push([feature.properties.LATITUDE, feature.properties.LONGITUDE]);
                        featureIdsLatLng.push(feature);

                        if (showAllPinOnFirstLoad) {
                            if (latLngArray.length > 1) {
                                var marker = L.marker([feature.properties.LATITUDE, feature.properties.LONGITUDE]).on('click', handleMarkerClickEvent).addTo(mymap);
                                var layer = L.geoJSON(feature, {
                                    color: "blue"
                                }).addTo(mymap);
                            } else {
                                mymap.flyTo(latLngArray[0], 6);
                            }
                        }
                    });

                    if (showAllPinOnFirstLoad && latLngArray.length > 1) {
                        mymap.fitBounds([latLngArray]);
                    }

                    $('#map').show();
                }); // add layer wms

                loadWms();
            }
        }

        function loadWms() {
            $.ajax({
                url: "https://data.medchm.net/geoserver/wms?service=wms&version=1.1.1&request=GetCapabilities",
                success: function success(e) {
                    wmsLoaded = true;
                    var t = $(e).find("Layer")[0];
                    $.each($(t).find("Layer"), function (e) {
                        capabilities.push({
                            id: $($(this).find("Name")[0]).text().split(":")[1],
                            prefix: $($(this).find("Name")[0]).text().split(":")[0],
                            bbox: [[parseFloat($(this).find("LatLonBoundingBox").attr("miny")), parseFloat($(this).find("LatLonBoundingBox").attr("minx"))], [parseFloat($(this).find("LatLonBoundingBox").attr("maxy")), parseFloat($(this).find("LatLonBoundingBox").attr("maxx"))]]
                        });
                    });
                    addContentLayers();
                }
            });
        }

        function addInfo() {
            info.onAdd = function () {
                this._div = L.DomUtil.create('div', 'info');
                this.update();
                return this._div;
            };

            info.update = function (props) {
                this._div.innerHTML = '<h4>{{ __('og.programs.title_header_map') }}</h4>';
            };

            info.addTo(mymap);
        }

        function getAspim(aspim) {
            $.ajax({
                method: 'GET',
                url: '{{ route('front.aspims.get_by_aspim') }}',
                data: {
                    aspim: aspim
                },
                dataType: 'JSON'
            }).success(function (response) {
                if (response.status) {
                    searchFeatures(response.data, response.aspim);
                }
            });
        }

        function searchFeatures(featuresId, aspim) {
            removeLayer();
            showPopup();
            featuresSearch = featureIdsLatLng.filter(function (f) {
                return featuresId === f.id;
            });

            if (featuresSearch) {
                var geojson = {
                    type: "FeatureCollection",
                    totalFeatures: featuresSearch.length,
                    features: featuresSearch,
                    crs: {
                        type: "name",
                        properties: {
                            name: "urn:ogc:def:crs:EPSG::4326"
                        }
                    }
                };
                var featureSearch = featuresSearch[0];
                var layer = L.geoJSON(geojson, {
                    color: "blue"
                }).addTo(mymap);
                var _featureSearch$proper = featureSearch.properties,
                    latitude = _featureSearch$proper.LATITUDE,
                    longitude = _featureSearch$proper.LONGITUDE;
                var marker = L.marker([featureSearch.properties.LATITUDE, featureSearch.properties.LONGITUDE]).on('click', handleMarkerClickEvent).addTo(mymap);
                mymap.flyTo([latitude, longitude], zoomIn);
                mymap.once("moveend", function () {
                    showPopup(aspim);
                });
            }
        }

        function removeLayer() {
            mymap.eachLayer(function (layer) {
                mymap.removeLayer(layer);
            });
            L.tileLayer("https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png", {
                noWrap: true,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mymap);
            addContentLayers();
        }

        function showPopup(aspim) {
            if (typeof aspim !== 'undefined') {
                $('.bloc_infos_map .title_info_map').html(aspim.title);
                $('.bloc_infos_map .link_liste').hide();
                $('.bloc_infos_map .text_info_map').hide();

                if (aspim.creation_text != '') {
                    $('.bloc_infos_map .text_info_map').html(aspim.text);
                    $('.bloc_infos_map .text_info_map').show();
                }

                if (aspim.link != '') {
                    $('.bloc_infos_map .link_liste').attr('href', aspim.link);
                    $('.bloc_infos_map .link_liste').show();
                }

                if (aspim.link == '' && aspim.title == '') {
                    $('.bloc_infos_map').hide();
                } else {
                    $('.bloc_infos_map').fadeIn('slow');
                }
            } else {
                $('.bloc_infos_map .title_info_map').html('');
                $('.bloc_infos_map').fadeOut('slow');
            }
        }

        function handleMarkerClickEvent(e) {
            var search = featureIdsLatLng.find(function (f) {
                return f.properties.latitude === e.latlng.lat && f.properties.longitude === e.latlng.lng;
            });
            var aspim = aspims.find(function (a) {
                return a.id == search.id;
            });

            if (search) {
                var _search$properties = search.properties,
                    latitude = _search$properties.LATITUDE,
                    longitude = _search$properties.LONGITUDE;
                mymap.flyTo([latitude, longitude], 8);
                mymap.once("moveend", function () {
                    showPopup(aspim);
                });
            }
        }

        function searchInSelect() {
            $('.input_search').bind('change keyup', function (e) {
                filterByCoIn($(this).val(), $('#included_at').val(), $('#country').val());
            });
            $('#country').on('change', function (e) {
                filterByCoIn($('.input_search').val(), $(this).val(), $('#included_at').val());
            });
            $('#included_at').bind('change keyup', function (e) {
                filterByCoIn($('.input_search').val(), $('#country').val(), $(this).val());
            });
        }

        function filterByCoIn(keywords, country, included_at) {
            $.ajax({
                url: '{{ route('front.aspims.get_aspim_by_country', $menu->slug) }}',
                data: {
                    keywords: keywords,
                    country: country,
                    included_at: included_at
                }
            }).success(function (response) {
                var select = '#aspim';
                $(select).empty().data('options');
                $(select).append($('<option>').text('{{__('sparac.aspims.filter_aspims')}}').val(''));

                featuresResponse = [];

                if (response.status) {
                    $.each(response.data, function (i) {
                        var options = response.data;
                        var option = options[i];
                        var search = featureIdsLatLng.find(function (f) {
                            return f.id === option.id;
                        });

                        if (search) {
                            featuresResponse.push(search);
                        }

                        $(select).append($('<option>').text(option.text).val(option.value));
                    });
                    existFilter = response.filter;
                    load(response.filter);
                } else {
                    load(false);
                }
            });
        }

        function setContentMap() {
            $('.content_map').on('click', function () {
                var that = $(this);

                if (that.hasClass('active')) {
                    that.removeClass('active');
                    mymap.eachLayer(function (layer) {
                        if (typeof layer.wmsParams !== 'undefined') {
                            mymap.removeLayer(layer);
                        }
                    });
                    layersOws = $.grep(layersOws, function (value) {
                        return value != that.data('id');
                    });
                } else {
                    that.addClass('active');
                    layersOws.push(that.data('id'));
                }

                addContentLayers();
            });
        }

        function addContentLayers() {
            if (wmsLoaded) {
                layersTab = capabilities.filter(function (l) {
                    return layersOws.includes(l.id);
                }).map(function (l) {
                    return l.id;
                });

                if (layersTab.length > 0) {
                    $.each(layersTab, function (i, v) {
                        $wmsMapLayer = L.tileLayer.wms(wmsBaseUrl, {
                            layers: v,
                            transparent: !0,
                            format: "image/png",
                            opacity: opacity
                        });
                        $wmsMapLayers[i] = $wmsMapLayer;
                        mymap.addLayer($wmsMapLayer);
                    });
                }

                if (layersTab.length == 1) {
                    if (typeof $wmsMapLayers[0] != 'undefined') {
                        var layerFitBounds = capabilities.filter(function (l) {
                            return layersOws.includes(l.id);
                        });
                        mymap.fitBounds([layerFitBounds[0].bbox[0], layerFitBounds[0].bbox[1]]);
                    }
                }

                mymap.setView(initPointContentLayers, 5, {
                    animation: true
                });
            }
        }
    </script>
    {{--    <script>
            function customRangeOacity() {
                $.each($(".custom-range-opacity"), function (i) {
                    let that = $(this);
                    let slider = new Slider('#' + that.attr('id'));
                    slider.on("slide", function (sliderValue) {
                        that.closest('.g-custom-range-opacity').find('label span').html(sliderValue);

                        if (that.hasClass('active')) {
                            that.removeClass('active');
                            layersOws = $.grep(layersOws, function (value) {
                                return value != that.data('id');
                            });
                        }
                        else {
                            that.addClass('active');
                            layersOws.push(that.data('id'));
                        }

                        addContentLayers();
                    });
                })
            }
        </script>--}}
@endsection
