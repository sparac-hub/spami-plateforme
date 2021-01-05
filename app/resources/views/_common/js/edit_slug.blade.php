<script>
    $(document).ready(function () {
        @php($routeNotAjaxHeaders=['back.aspims.edit', 'back.aspims.create'])
        @if(!in_array(\Route::currentRouteName() , $routeNotAjaxHeaders))
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        @endif

        @foreach(config('translatable.locales') as $locale)
        $('#name_{{ $locale }}').on("keyup", function () {
            $('#slug_{{ $locale }}').val(str_slug($(this).val()));
        });
        $('#title_{{ $locale }}').on("keyup", function () {
            $('#slug_{{ $locale }}').val(str_slug($(this).val()));
        });
        @endforeach
    });

    var err = '';
    $.validator.addMethod("exitsSlug", function (value, element) {
        var v = false;
        var validator = this;
        var id = {{ $menu->id }};
        var name = element.name;
        var id_elem = element.id;
        var reference = {{ $module }};
        var menu_id = {{ $menu->menu_id }};
        $.ajax({
            url: "{{route('menus.check_slug_module')}}",
            type: "post",
            dataType: "Json",
            async: false,
            data: {slug: value, id: id, name: name, reference: reference, menu_id: menu_id},
            success: function (ret) {
                if (ret.rst === 1) {
                    $('.has-feedback').removeClass('has-error');
                    $('.has-feedback').addClass('has-success');
                    $('.form-control-feedback').removeClass('glyphicon-remove');
                    $('.form-control-feedback').addClass('glyphicon-ok');
                    $('button.block').removeClass('hide');
                    v = true;
                    err = '';
                } else {
                    var new_value = value + '-' + menu_id + 1;
                    err = 'Le slug existe déjà, vous pouvez entrer ceci: <a rel="' + id_elem + '" href="#?" id="' + id_elem + '_propostion" data-value="' + new_value + '" onclick="javascript:setProp(this);">' + new_value + '</a>';
                    $('.has-feedback').removeClass('has-success');
                    $('.has-feedback').addClass('has-error');
                    $('.form-control-feedback').removeClass('glyphicon-ok');
                    $('.form-control-feedback').addClass('glyphicon-remove');
                    $('button.block').addClass('hide');
                    v = false;

                }
            }
        });
        return v;
    }, function (params, element) {
        return err;
    });

    // langue cms
    var tab_lang = [];

    @foreach(config('translatable.locales') as $k => $locale)
    tab_lang.push('{{ $locale }}');
    @endforeach

    if (tab_lang.length) {
        $.each(tab_lang, function (i, l) {
            $("#slug_" + l).rules("add", {
                exitsSlug: true
            });
        });
    }
</script>
