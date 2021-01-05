@php
    $first_banners = \App\Models\Cms\Widget::whereReference('first_banners')->first();
@endphp

@if($first_banners)

    @php
        $first_banners_elements = get_widget_elements($first_banners);
    @endphp

    <!--Slider Start-->
    @if(!($first_banners_elements->isEmpty()))
        <div class="owl-carousel owl-theme banner_principale">

            @foreach($first_banners_elements as $key => $element)
                @if($element->type == "image_file")
                    @php
                        $route_for_banner = route_for_banner($element);
                    @endphp

                    <div class="item">
                        {{--<img src="{{ asset("front/assets/images/jpg/banner1.jpg") }}" class="img_banner_princ" alt="banniere principale"/>--}}
                        {!! $element->description !!}
                        <img src="{{$element->image_filepath}}" class="img_banner_princ img_banner_princ_up"
                             alt="banniere principale"/>
                        <div class="container">
                            <div class="content_banner_principale">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h2 class="titre_banner">{{ $element->title }}</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        @if($element->title_2)
                                            <p class="desc_banner">{{ $element->title_2 }}</p>
                                        @endif
                                    </div>
                                </div>
                                @if($route_for_banner != "javascript:")
                                    <a href="{{ $route_for_banner }}" class="link_banner"><i class="zmdi zmdi-plus"></i></a>
                                @endif
                            </div>
                        </div>

                        @php
                            $num = (($key+1) < $first_banners_elements->count())?($key+1):0;
                            $next_elem = $first_banners_elements[$num];
                        @endphp

                        <div class="bloc_next_slide">
                            <a href="#?">
                                {{--{!! $next_elem->description !!}--}}
                                <img src="{{$next_elem->image_filepath}}" alt=""/>
                                <span class="title_next_slide">{{ $next_elem->title }}</span>
                            </a>
                        </div>

                    </div>

                @endif
            @endforeach

        </div>
    @endif
    <!--Slider End-->

@endif
