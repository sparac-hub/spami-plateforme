<script type="text/javascript">
    $(document).ready(function () {

        $("select[name='governorate_id']").on('change', function () {
            var governorate_id = $(this).val();
            $.ajax({
                url: "{{route('front.cities.get_by_governorate', null)}}/" + governorate_id,
                beforeSend: function (xhr) {
                    xhr.overrideMimeType("text/plain; charset=x-user-defined");
                }
            })
                .done(function (data) {
                    data = JSON.parse(data);
                    var addHtml = '';
                    addHtml += '<option value="">Toutes</option>';
                    $.each(data, function (key, value) {
                        addHtml += "<option value='" + value.id + "'>" + value.name + "</option>";
                    });

                    $("select[name='city_id']").html(addHtml)@if(isset($bootstrap_select_refresh)).selectpicker('refresh')@endif;
                    {{--$("select[name='city_id']").selectpicker('render').selectpicker('refresh');--}}

                    @if(isset($search['city_id']))
                    $("select[name='city_id']")
                        .val({{$search['city_id']}})
                        .trigger('change');
                    @endif

                    {{--
                      // if ( console && console.log ) {
                      //   data = JSON.parse(data);
                      //   $.each(data, function( index, value ) {
                      //     $("select[name='city_id']").append($('<option>', {
                      //         value: value.id,
                      //         text : value.name
                      //     }));
                      //   });
                      //   $("select[name='city_id']").selectpicker('refresh');
                      // }
                    --}}
                });
        });

        @if(isset($search['city_id']))
        <?php
        $city = App\Models\Cms\City::find($search['city_id']);
        $search['governorate_id'] = isset($city->governorate->id) ? $city->governorate->id : '';
        ?>
        @endif

        @if(isset($search['governorate_id']))
        $("select[name='governorate_id']")
            .val({{$search['governorate_id']}})
            .trigger('change');
        @endif


    });
</script>
