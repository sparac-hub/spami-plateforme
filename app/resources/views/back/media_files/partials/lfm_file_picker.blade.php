<script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
    $(document).ready(function () {
                {{-- TODO: make this cleaner --}}
        var domain = "{{ url(config('lfm.url_prefix')) }}";

        $('#lfm').filemanager('image', {prefix: domain});
        $('#thumbnail').on('change', function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#images').html('<img src="' + $(this).val() + '" style="margin:15px 10px 15px 10px;max-height:100px;">');

        });

        $('#lfm-video-btn').filemanager('video', {prefix: domain});
        $('#lfm-video-thumbnail').on('change', function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#lfm-video').html(`<video width="320" height="240" controls>
                <source src="` + $(this).val() + `" type="video/mp4">
                        Your browser does not support the video tag.
                </video>`);

        });

        $('#lfm-image-btn-url').filemanager('image', {prefix: domain});
        $('#lfm-image-thumbnail-url').on('change', function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#lfm-image-url').html('<img src="' + $(this).val() + '" style="margin:15px 10px 15px 10px;max-height:100px;">');

        });

        $("a[id^=lfm-image-btn-]").filemanager('image', {prefix: domain});
        $("input[id^=lfm-image-thumbnail-]").on('change', function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(this).parents('.form-group').find('.lfm-image').html('<img src="' + $(this).val() + '" style="margin:15px 10px 15px 10px;max-height:100px;">');

        });

        $('#lfm-image-btn').filemanager('image', {prefix: domain});
        $('#lfm-image-thumbnail').on('change', function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#lfm-image').html('<img src="' + $(this).val() + '" style="margin:15px 10px 15px 10px;max-height:100px;">');

        });

        $('select[name="type"]').on('change', function () {
            var type_file = $(this).val();
            if (type_file == "{{ \App\Models\Cms\MediaFile::IMAGE }}") {
                $("#image_file").css('display', 'block');
                $("#video_file").css('display', 'none');
                $("#script").css('display', 'none');
            } else if (type_file == "{{ \App\Models\Cms\MediaFile::VIDEO }}") {
                $("#video_file").css('display', 'block');
                $("#image_file").css('display', 'none');
                $("#script").css('display', 'none');
            } else {

            }
        });
    });
</script>
