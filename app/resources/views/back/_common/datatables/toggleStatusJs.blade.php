<script>
    $(document).ready(function () {

        $('table').on('click', '.toggle-status', function (e) {
            var el = $(this);
            var id = el.attr('id');

            $.ajax({
                url: '{{ route($route) }}',
                data: {
                    id: id,
                    toggleStatus: true
                },
                dataType: 'JSON',
                method: 'GET'
            }).done(function (resp) {
                if (resp.status == 'success') {
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "positionClass": "toast-top-right",
                        "onclick": null,
                        "showDuration": "1000",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }

                    if (resp.is_active == 1) {
                        el.removeClass('btn-default').addClass('btn-success');
                    } else {
                        el.removeClass('btn-success').addClass('btn-default');
                    }
                    toastr.success("{{ __('og.alert.success') }}", "{{ __('og.alert_title.congratulations') }}");
                }
            });
        });

    });
</script>
