<!-- overlay -->
@include(front_dir() . '.layouts.app_partials.main_menu')
<!-- overlay -->
<header id="header">
    <div class="container-fluid no-padding">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="link_img_logo">
                    <img src="{{ asset("front/assets/images/png/logo.png") }}" alt="ASPIM aire marine, SPARAC"
                         class="img_logo"/>
                    @if(locale() == 'fr')
                        <span class="slogan_logo">Plateforme Collaborative ASPIM</span>
                    @else
                        <span class="slogan_logo">SPAMI Collaborative Platform</span>
                    @endif
                </h1>
            </div>

            @php
                $col_md = "col-md-3";
            @endphp
            @include(front_dir() . '.layouts.app_partials.main_menu_right')

        </div>
    </div>

</header>



