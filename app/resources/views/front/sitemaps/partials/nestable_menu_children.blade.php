@foreach($menus_tree as $menu)
    <li class="dd-item" data-id="{{ $menu['id'] }}">
        <div class="dd-handle-">
            <a href="{{ generate_menu_url($menu) }}">
                <i class="fa fa-chevron-right" aria-hidden="true"></i> {{ $menu['label'] }}
            </a>
        </div>
        @if(count($menu['childrens']))
            <ol class="dd-list">
                @include(front_dir().'.sitemaps.partials.nestable_menu_children', ['menus_tree'=>$menu['childrens']])
            </ol>
        @endif
    </li>
@endforeach
