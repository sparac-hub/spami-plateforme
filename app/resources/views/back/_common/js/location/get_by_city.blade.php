<script type="text/javascript">
    $(document).ready(function () {

        $("select[name='city_id']").on('change', function () {
            var city_id = $(this).val();
            $.ajax({
                url: "{{route('front.zones.get_by_city', null)}}/" + city_id,
                beforeSend: function (xhr) {
                    xhr.overrideMimeType("text/plain; charset=x-user-defined");
                }
            })
                .done(function (data) {
                    data = JSON.parse(data);
                    var addHtml = '';
                    addHtml += '<option value="">Toutes</option>';
                    $.each(data, function (key, value) {
                        addHtml += "<option value='" + value.id + "'>" + value.name + ' {' + value.postal_code + "}</option>";
                    });

                    $("select[name='zone_id']").html(addHtml)@if(isset($bootstrap_select_refresh)).selectpicker('refresh')@endif;
                    {{--$("select[name='zone_id']").selectpicker('render').selectpicker('refresh');--}}

                    @if(isset($search['zone_id']))
                    $("select[name='zone_id']")
                        .val({{$search['zone_id']}})
                        .trigger('change');
                    @endif

                    {{--
                      // if ( console && console.log ) {
                      //   data = JSON.parse(data);
                      //   $.each(data, function( index, value ) {
                      //     $("select[name='zone_id']").append($('<option>', {
                      //         value: value.id,
                      //         text : value.name
                      //     }));
                      //   });
                      //   $("select[name='zone_id']").selectpicker('refresh');
                      // }
                    --}}
                });
        });

        @if(isset($search['zone_id']))
        <?php
        $zone = App\Models\Cms\City::find($search['zone_id']);
        $search['zone_id'] = isset($zone->zone->id) ? $zone->zone->id : '';
        ?>
        @endif

        @if(isset($search['zone_id']))
        $("select[name='zone_id']")
            .val({{$search['zone_id']}})
            .trigger('change');
        @endif


    });
</script>
