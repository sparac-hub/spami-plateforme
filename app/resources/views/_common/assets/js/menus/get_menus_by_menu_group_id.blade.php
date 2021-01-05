<script type="text/javascript">
    $(document).ready(function () {

        $("select[name='menu_group_id']").on('change', function () {
            var menu_group_id = $(this).val();
            $.ajax({
                url: "{{route('menus.get_by_menu_group_id', null)}}/" + menu_group_id,
                {{--
                Problem with special characters encoding !
                beforeSend: function (xhr) {
                    xhr.overrideMimeType("text/plain; charset=x-user-defined");
                }
                --}}
            })
                .done(function (data) {
                    data = '<option value=""></option>' + data;
                    jQuery("select[name='parent_id']").html(data);
                    {{--$("select[name='parent_id']").selectpicker('render').selectpicker('refresh');--}}

                    @if(isset($search['parent_id']))
                    $("select[name='parent_id']")
                        .val({{$search['parent_id']}})
                        .trigger('change');
                    @endif

                    {{-- This action is triggered when we access the url: [menus/create?parent_id=36] --}}
                    @if(isset($parent_id))

                    $("select[name='parent_id']")
                        .val({{$parent_id}})
                        .trigger('change');

                    {{-- Edit Action --}}
                    @if(isset($menu->id))
                    $("select[name='parent_id'] option[value='{{ $menu->id }}'").attr('disabled', 'disabled');
                    @endif

                    {{-- Create Action --}}
                    $("select[name='parent_id'] option[value='{{ $parent_id }}'");

                    @if(isset($children_id))
                    @if(count($children_id))
                    @foreach($children_id as $id)
                    $("select[name='parent_id'] option[value='{{ $id }}'").attr('disabled', 'disabled');
                    @endforeach
                    @endif
                    @endif

                    @endif


                    {{--
                      // if ( console && console.log ) {
                      //   data = JSON.parse(data);
                      //   $.each(data, function( index, value ) {
                      //     $("select[name='parent_id']").append($('<option>', {
                      //         value: value.id,
                      //         text : value.name
                      //     }));
                      //   });
                      //   $("select[name='parent_id']").selectpicker('refresh');
                      // }
                    --}}
                });
        });

        @if($menu_group_id)
        $("select[name='menu_group_id']")
            .val({{$menu_group_id}})
            .trigger('change');
        @endif


    });
</script>
{{--
    @if(isset($search['parent_id']))
        < ?php
        $city = App\Models\Cms\Menu::find($search['parent_id']);
        $search['menu_group_id'] = isset($menu->menu_group->id)?$menu->menu_group->id:'';
        ?>
    @endif
--}}
