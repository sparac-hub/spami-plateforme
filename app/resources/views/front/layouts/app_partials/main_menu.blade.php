@php
    $mainMenu = get_cached_menus('main-menu');
    $mainMenu = buildTree($mainMenu->toArray(), $parentId = null);

    $secondaryMenu = get_cached_menus('secondary-menu');
    $secondaryMenu = buildTree($secondaryMenu->toArray(), $parentId = null);
@endphp

<div class="overlay">
    <div class="content_overlay">
        @if(count($mainMenu))
            <nav class="menu_top">
                <ul>
                    @foreach ($mainMenu as $element)

                        <li>
                            @if(count($element['childrens']))
                                <a href="{{ $element['url'] }}"
                                   @if($element['link_target']) target="{{ $element['link_target'] }}" @endif
                                >{{ $element['label'] }}</a>
                                {{-- <ul>
                                     @foreach($element['childrens'] as $children)
                                         <li>
                                             <a href="{{ $children['url'] }}"
                                                @if($children['link_target']) target="{{ $children['link_target'] }}" @endif
                                             >{{ $children['label'] }}</a>
                                         </li>
                                     @endforeach
                                 </ul>--}}
                            @else
                                <a href="{{ $element['url'] }}"
                                   @if($element['link_target']) target="{{ $element['link_target'] }}" @endif
                                >{{ $element['label'] }}</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </nav>
        @endif

        @if(count($secondaryMenu))
            <nav class="menu_bottom">
                <ul>
                    @foreach ($secondaryMenu as $secondary_element)
                        <li>
                            <a href="{{ $secondary_element['url'] }}"
                               @if($secondary_element['link_target']) target="{{ $secondary_element['link_target'] }}" @endif
                            >{{ $secondary_element['label'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        @endif
    </div>
    <div class="blc_copyright">
        <p>{{ __('og.menus.copyright') }}</p>
        {{-- <p>{{ __('og.menus.copyright2') }}</p>--}}
    </div>
</div>
