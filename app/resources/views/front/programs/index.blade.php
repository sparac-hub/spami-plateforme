@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('main_content')
    <section class="wrap_content_pages">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="breadcrumb_spa">
                        @include('front.layouts.app_partials.breadcrumbs')
                    </div>

                    @include(front_dir().'.programs.partials.filter_index')
                </div>
            </div>
        </div>

        <div class="container_map">
            <div class="container-fluid no-padding">
                <div class="col-md-12 no-padding col_map_jumlage">
                    <div id="map" style="height: 700px;">
                        <div class="bloc_infos_map" style="display: none;">
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

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
@endsection

@section('js')
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    {{--    <script src="https://elfalem.github.io/Leaflet.curve/src/leaflet.curve.js"></script>--}}
    <script src="{{asset('front/assets/js/vendors/leaflet.curve.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
    <script>
        "use strict";

        var featureIdsLatLng = [];
        var mymap = null;
        var featuresSearch = [];
        var polyline = null;
        var featuresResponse = [];
        $(function () {
            intMap();
            searchInSelect();
            $('.program_aspims').on('change', function () {
                var program = $(this);
                showPopup();

                if (parseInt(program.val())) {
                    getProgram(program.val());
                } else {
                    load();
                }
            });
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
            }).addTo(mymap); // load data

            load();
        }

        function load() {
            removeLayer();
            showPopup();

            if (typeof featuresResponse !== 'undefined' && featuresResponse.length > 0) {
                // Load all aspims geojson into the map
                var latLngArray = [];
                featuresResponse.forEach(function (feature) {
                    latLngArray.push([feature.properties.latitude, feature.properties.longitude]);
                    featureIdsLatLng.push(feature);
                    var layer = L.geoJSON(feature, {
                        color: "blue"
                    }).addTo(mymap);
                });
                mymap.fitBounds([latLngArray]);
            } else {
                $.ajax({
                    method: 'GET',
                    url: "https://data.medchm.net/geoserver/medbiodivsdi/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=medbiodivsdi:mapamed_spamis_wgs84&maxFeatures=50&outputFormat=application%2Fjson",
                    dataType: 'JSON'
                }).success(function (response) {
                    featuresResponse = response.features; // Load all aspims geojson into the map

                    var latLngArray = [];
                    featuresResponse.forEach(function (feature) {
                        latLngArray.push([feature.properties.latitude, feature.properties.longitude]);
                        featureIdsLatLng.push(feature);
                        var layer = L.geoJSON(feature, {
                            color: "blue"
                        }).addTo(mymap);
                    });
                    mymap.fitBounds([latLngArray]);
                    $('#map').show();
                });
            }
        }

        function getProgram(program) {
            $.ajax({
                method: 'GET',
                url: '{{ route('front.programs.get_by_program') }}',
                data: {
                    program: program
                },
                dataType: 'JSON'
            }).success(function (response) {
                if (response.status) {
                    searchFeatures(response.data, response.program);
                }
            });
        }

        function searchFeatures(featuresIds, program) {
            removeLayer();
            showPopup();
            featuresSearch = featureIdsLatLng.filter(function (f) {
                return featuresIds.includes(f.id);
            });
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
            var layer = L.geoJSON(geojson, {
                color: "blue"
            }).addTo(mymap);

            if (featuresSearch && featuresIds.length > 1) {
                drawCurvedLine(featuresIds);
                mymap.flyToBounds(polyline.getBounds());
                mymap.once("moveend", function () {
                    showPopup(program);
                });
            }
        }

        function drawCurvedLine() {
            var c = [];
            var latlngs = [];
            featuresSearch.forEach(function (i) {
                var _i$properties = i.properties,
                    latitude = _i$properties.latitude,
                    longitude = _i$properties.longitude;
                c.push([latitude, longitude]);
            });
            var latlng1 = c[0],
                latlng2 = c[1] || c[0];
            var offsetX = latlng2[1] - latlng1[1],
                offsetY = latlng2[0] - latlng1[0];
            var r = Math.sqrt(Math.pow(offsetX, 2) + Math.pow(offsetY, 2)),
                theta = Math.atan2(offsetY, offsetX);
            var thetaOffset = 3.14 / 10;
            var r2 = r / 2 / Math.cos(thetaOffset),
                theta2 = theta + thetaOffset;
            var midpointX = r2 * Math.cos(theta2) + latlng1[1],
                midpointY = r2 * Math.sin(theta2) + latlng1[0];
            var midpointLatLng = [midpointY, midpointX];
            latlngs.push(latlng1, midpointLatLng, latlng2);
            var pathOptions = {
                weight: 2
            };
            var durationBase = 500;

            if (r > 0) {
                var duration = Math.sqrt(Math.log(r)) * durationBase;
                duration = $.isNumeric(duration) && duration >= 0 ? duration : durationBase; // Scales the animation duration so that it's related to the line length
                // (but such that the longest and shortest lines' durations are not too different).
                // You may want to use a different scaling factor.

                pathOptions.animate = {
                    duration: duration,
                    iterations: 1,
                    easing: 'ease-in',
                    direction: 'normal'
                };
            }

            polyline = L.curve(['M', latlng1, 'Q', midpointLatLng, latlng2], pathOptions).addTo(mymap);
        }

        function removeLayer() {
            mymap.eachLayer(function (layer) {
                mymap.removeLayer(layer);
            });
            L.tileLayer("https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png", {
                noWrap: true,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mymap);
        }

        function showPopup(program) {
            if (typeof program !== 'undefined') {
                $('.bloc_infos_map .title_info_map').html(program.title);
                $('.bloc_infos_map .link_liste').hide();
                $('.bloc_infos_map .text_info_map').hide();

                if (program.link != '') {
                    $('.bloc_infos_map .link_liste').attr('href', program.link);
                    $('.bloc_infos_map .link_liste').show();
                }

                if (program.established != '') {
                    $('.bloc_infos_map .text_info_map').html(program.established);
                    $('.bloc_infos_map .text_info_map').show();
                }

                if (program.established == '' && program.link == '' && program.title == '') {
                    $('.bloc_infos_map').hide();
                } else {
                    $('.bloc_infos_map').fadeIn('slow');
                }
            } else {
                $('.bloc_infos_map .title_info_map').html('');
                $('.bloc_infos_map').fadeOut('slow');
            }
        }

        function searchInSelect() {
            $.fn.filterByText = function (textbox, selectSingleMatch) {
                return this.each(function () {
                    var select = this;
                    var options = [];
                    $(select).find('option').each(function () {
                        options.push({
                            value: $(this).val(),
                            text: $(this).text()
                        });
                    });
                    $(select).data('options', options);
                    $(textbox).bind('change keyup', function () {
                        var options = $(select).empty().data('options');
                        var search = $.trim($(this).val());
                        var regex = new RegExp(search, "gi");
                        $.each(options, function (i) {
                            var option = options[i];

                            if (option.text.match(regex) !== null) {
                                $(select).append($('<option>').text(option.text).val(option.value));
                            }
                        });

                        if (selectSingleMatch === true && $(select).children().length === 1) {
                            $(select).children().get(0).selected = true;
                        }
                    });
                });
            };

            $('#program').filterByText($('.input_search'), true);
        }
    </script>
@endsection
