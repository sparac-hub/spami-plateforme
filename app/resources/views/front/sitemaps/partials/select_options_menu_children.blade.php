@foreach($menus_tree as $menu)

    @php($menu = (object)$menu)

    <option value="{{ $menu->id }}">{{ $niv }}{{ $menu->label }}</option>

    @if(@$menu->childrens)
        @include('back.menus.partials.select_options_menu_children', ['menus_tree'=>$menu->childrens, 'niv'=>' - - '.$niv])
    @endif

@endforeach
