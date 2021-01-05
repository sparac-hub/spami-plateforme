<script src="{{asset('back/assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js')}}"
        type="text/javascript"></script>
<script src="{{ asset('/back/assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"
        type="text/javascript"></script>

<script src="{{ asset('/back/assets/global/plugins/jquery-nestable/jquery.nestable.js') }}"
        type="text/javascript"></script>

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var UINestable = function () {

        var updateOutput = function (e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                var menuGroupData = window.JSON.stringify(list.nestable('serialize'));
                $(output.selector).val(menuGroupData);
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };

        return {

            init: function () {

                @foreach($widgets as $menuGroup)
                {{ '// activate Nestable for list '. $menuGroup->id }}
                $('#nestable_list_{{ $menuGroup->id }}').nestable({
                    group: 1
                }).on('change', updateOutput);
                updateOutput($('#nestable_list_{{ $menuGroup->id }}').data('output', $('#nestable_list_ids_{{ $menuGroup->id }}')));
                @endforeach
            }
        };
    }();

    $(document).ready(function () {
        UINestable.init();

        $('.nestable_list_button').on('click', function () {
            var id = $(this).attr('id');
            var menu_group_data = $(this).parent().find('#nestable_list_ids_' + id).val();

            $.ajax({
                url: '{{ route('back.widget_elements.update_order') }}',
                data: {id: id, menu_group_data: menu_group_data},
                dataType: 'JSON',
                method: 'POST'
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
                    toastr.success("{{ __('og.alert.success') }}", "{{ __('og.alert_title.congratulations') }}");
                }
            });
        });
    });
</script>
