@include(front_dir() . '.layouts.app_partials.main_menu')

<header id="header_interne" class="header_interne">

    <div class="container-fluid no-padding">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <a href="{{ route('front.home') }}" class="link_img_logo"><img
                            src="{{ asset("front/assets/images/png/logo.png") }}" alt="ASPIM aire marine, SPARAC"
                            class="img_logo"/>
                    @if(locale() == 'fr')
                        <span class="slogan_logo">Plateforme Collaborative ASPIM</span>
                    @else
                        <span class="slogan_logo">SPAMI Collaborative Platform</span>
                    @endif

                </a>
            </div>
            @php
                $col_md = "col-md-2";
            @endphp
            @include(front_dir() . '.layouts.app_partials.main_menu_right')

            <div class="col-xs-12 col-sm-12 col-md-7 text-center">
                @isset($menu->label)
                    @if(\Request::route()->getName() == 'front.routes.show' && optional($menu->module)->reference == 'aspims')
                        @yield('header_interne')
                    @else

                        <h1 class="title_top">
                            {{ $menu->label }}
                        </h1>

                        @php
                            $children = get_children_menu($menu);
                        @endphp

                        @if($children->isNotEmpty())
                            <ul class="box_type_display">
                                @foreach ($children as $child)
                                    <li class="list_button {{ ($child->slug == $menu->slug)?'active':'' }}">
                                        <a href="{{ route('front.routes.index', $child->slug) }}">{{ $child->label }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif


                        @yield('header_interne')
                    @endif
                @else
                    <h1 class="title_top">
                        Forum
                    </h1>
                @endisset
            </div>

        </div>
    </div>
</header>
