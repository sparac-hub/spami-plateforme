<script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
    $(document).ready(function () {
        var domain = "{{ url(config('lfm.url_prefix')) }}";

        $('#lfm-image-btn').filemanager('image', {prefix: domain});
        $('#lfm-image-thumbnail').on('change', function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#lfm-image').html('<img src="' + $(this).val() + '" style="margin:15px 10px 15px 10px;max-height:100px;">');

        });

        $('#select_type').change(function (e) {
            var type = $('#select_type').val();
            if (type == 'latest') {
                $('#number_for_latest_div').css('display', 'block');
                $("#number_for_latest_div").prop('required', true);
            } else {
                $('#number_for_latest_div').css('display', 'none');
                $("#number_for_latest_div").prop('required', false);
            }
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#module_id').change(function (e) {
            var module = $(this).val();
            var url = '{{route('back.widget_elements.module_orderable_columns')}}';
            $.ajax({
                type: 'POST',
                data: {module_id: module},
                url: url,
                dataType: "Json",
            }).done(function (result) {
                if (result.status == 'success') {
                    $("#order_column").html('');
                    var i;
                    for (i = 0; i < result.orderable_columns.length; ++i) {
                        var o = new Option(result.orderable_columns[i], result.orderable_columns[i]);
                        $(o).html(result.orderable_columns[i]);
                        $("#order_column").append(o);
                    }
                }
            });
        });
    });
</script>