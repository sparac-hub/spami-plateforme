<script type="text/javascript">
    $(document).ready(function () {

        $("select[name='country_id']").on('change', function () {
            var country_id = $(this).val();
            $.ajax({
                url: "{{route('front.governorates.get_by_country', null)}}/" + country_id,
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
                    jQuery("select[name='governorate_id']").html(addHtml);
                    {{--$("select[name='governorate_id']").selectpicker('render').selectpicker('refresh');--}}

                    @if(isset($search['governorate_id']))
                    $("select[name='governorate_id']")
                        .val({{$search['governorate_id']}})
                        .trigger('change');
                    @endif

                    {{--
                      // if ( console && console.log ) {
                      //   data = JSON.parse(data);
                      //   $.each(data, function( index, value ) {
                      //     $("select[name='governorate_id']").append($('<option>', {
                      //         value: value.id,
                      //         text : value.name
                      //     }));
                      //   });
                      //   $("select[name='governorate_id']").selectpicker('refresh');
                      // }
                    --}}
                });
        });

        @if(isset($search['governorate_id']))
        <?php
        $governorate = App\Models\Cms\Governorate::find($search['governorate_id']);
        $search['country_id'] = isset($governorate->country->id) ? $governorate->country->id : '';
        ?>
        @endif

        @if(isset($search['country_id']))
        $("select[name='country_id']")
            .val({{$search['country_id']}})
            .trigger('change');
        @endif


    });
</script>
