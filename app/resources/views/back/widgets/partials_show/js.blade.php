<script src="{{asset('back/assets/apps/scripts/todo-2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('back/assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('/back/assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"
        type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.checkbox_belongs').on('click', function (e) {
            if ($(this).is(":checked")) {
                var status = 1;
            } else {
                var status = 0;
            }
            var element_id = $(this).attr('value');
            var widget_id = $(this).attr('data');

            var url = '{{route('back.widget_elements.update_collection')}}';
            $.ajax({
                type: 'GET',
                data: {status: status, element_id: element_id, widget_id: widget_id},
                url: url,
                dataType: "Json",
            }).done(function (result) {
                if (result.status == 'success') {
                    var div_id = '#green_or_red_' + result.widget_id;
                    if (result.type == 'delete') {
                        $(div_id).removeClass('todo-tasklist-item-border-green');
                        $(div_id).addClass('todo-tasklist-item-border-blue');
                    } else {
                        $(div_id).removeClass('todo-tasklist-item-border-blue');
                        $(div_id).addClass('todo-tasklist-item-border-green');
                    }
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
                    toastr.success("{{ __('og.alert.success') }}", "{{ __('og.alert_title.congratulations') }}");
                }
            });
        });
    });
</script>
