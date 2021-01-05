<div class="col-xs-12 col-sm-6 blc_right_menu blc_right_menu_interne float-right-menu {{ $col_md }}">
    <a href="#?" class="icon_menu">
        <span class="menu_click open_menu">{{ __('og.home.menu') }}</span>
        <span></span>
        <span></span>
        <span class="menu_click close_menu">{{ __('og.home.fermer') }}</span>
    </a>

    @php
        $otherMenu = get_cached_menus('other-menu');
        $otherMenu = buildTree($otherMenu->toArray(), $parentId = NULL);
    @endphp

    @foreach ($otherMenu as $element)
        <a data-html2canvas-ignore="" href="{{ $element['url'] }}"
           class="icon_tel_header icon_menu" @if($element['link_target']) target="{{ $element['link_target'] }}" @endif>
            <span class="menu_click open_menu">{{ $element['label'] }}</span>
            <i class="fa fa-phone" style="position: absolute; right: 22px; top: 20px;"></i>
        </a>
    @endforeach

    @if(get_cached_active_locales_number() != 1)
        @foreach(config('translatable.locales') as $locale)
            @if(locale() != $locale)

                @if(request()->segment(2) != null && request()->segment(2) == 'forums')
                    <a class="icon_chat_header" style="background: rgb(0, 160, 224) !important;"
                       href="{{ route_for_forums($locale) }}"
                       rel="alternate">
                        <span style="color: white;">{{ strtoupper($locale) }}</span>
                    </a>
                @else
                    <a class="icon_chat_header" style="background: rgb(0, 160, 224) !important;"
                       href="{{ $localizedUrls[$locale] ?? url($locale) }}"
                       rel="alternate"
                       hreflang="{{ $locale }}">
                        <span style="color: white;">{{ strtoupper($locale) }}</span>
                    </a>
                @endif
            @endif
        @endforeach
    @endif


</div>
