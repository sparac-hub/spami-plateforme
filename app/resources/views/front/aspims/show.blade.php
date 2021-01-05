@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$aspim->name}}@endsection

@section('meta_description'){{$aspim->description}}@endsection

@section('og_tags_element')
    @php
        $element = $aspim;
        $hasMedia = true;
    @endphp
    @include('front.layouts.app_partials.tags',["element" => $element,"hasMedia" => $hasMedia])
@endsection

@section('body_class')
    fiche_aspim_page" style="background: url({{ asset('front/assets/images/jpg/bg_interne.jpg')}}) 0 0 no-repeat; background-size:cover;
@endsection

@section('header_interne')
    <h1 class="title_top">
        {{ $aspim->name }}
    </h1>
@endsection

@section('main_content')

    <section class="wrap_content_pages">
        <div class="bloc_top_fiche_aspim">
            <div class="container" id="container-upload-pdf">

                <div class="row ">
                    <div class="col-md-4 col-fiche-aspim">
                        <div class="bloc_fiche_aspim">
                            <div class="bloc_top_aspim">
                                @if($image = $aspim->getMedia()->first())
                                    <img src="{{ $image->getFullUrl() }}" alt="image aspim" class="img_aspim"/>
                                @endif
                                <span class="lieu_aspim">
                                @foreach($aspim->countries as $country)
                                        {{ $country->name }}
                                    @endforeach
                            </span>

                                @if (!$aspim->getMedia('aspim_medias')->isEmpty())
                                    <a href="{{ url("#?") }}" class="loop_gallerie" data-toggle="modal"
                                       data-target="#gallerie_aspim"><i class="zmdi zmdi-search"></i></a>
                                @endif
                            </div>
                            <div class="bloc_bottom_aspim">
                                <h2 class="title_aspim">{{ $aspim->name }}</h2>
                                <ul>
                                    <li><span>{{ __('sparac.aspims.countries') }}</span>
                                        @foreach($aspim->countries as $country)
                                            {{ $country->name }}
                                        @endforeach
                                    </li>
                                    <li><span>{{ __('sparac.aspims.creation_date') }}</span> {{ $aspim->creation_date }}
                                    </li>
                                    <li><span>{{ __('sparac.aspims.included_at') }}</span> {{ $aspim->included_at }}
                                    </li>
                                    <li><span>{{ __('sparac.aspims.status') }}</span> {{ $aspim->status }}</li>
                                    <li><span>{{ __('sparac.aspims.creation_text') }}</span>
                                        @if($pdf = $aspim->getMedia('document')->first())
                                            <a href="{{ $pdf->getFullUrl() }}" download>
                                                {{ $aspim->creation_text }}
                                            </a>
                                        @endif
                                    </li>
                                    <li><span>{{ __('sparac.aspims.total_surface') }}</span> {{ $aspim->total_surface }}
                                        ha
                                    </li>
                                    <li>
                                        <span>{{ __('sparac.aspims.total_surface_marine') }}</span> {{ $aspim->total_surface_marine }}
                                        ha
                                    </li>
                                    <li><span>{{ __('sparac.aspims.width') }}</span> {{ $aspim->width }} km</li>
                                    <li>
                                        <span>{{ __('sparac.aspims.category') }}</span> {{ optional($aspim->category)->name }}
                                    </li>
                                </ul>
                                <div class="website_aspim">
                                    <p><span>{{ __('sparac.aspims.website') }}</span> <a href="{{ $aspim->website }}"
                                                                                         target="_blank">{{ $aspim->website_name }}</a>
                                    </p>
                                </div>
                                @if($pdf = $aspim->getMedia('document')->first())
                                    <div class="download_pdf_aspim">
                                        {{--<a href="{{ $pdf->getFullUrl() }}" download class="btn_download_pdf" id="btn_generate_pdf"><i class="fa fa-download"></i><span>{{ __('sparac.aspims.download_pdf') }}</span></a>--}}
                                        <div onclick="window.print()" class="btn_download_pdf"><i
                                                    class="fa fa-download"></i><span>{{ __('sparac.aspims.download_pdf') }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 owl-col-fiche-aspim">
                        <div class="owl-carousel owl_fiche_aspim owl-theme">
                            @if($aspim->schemas)
                                <div class="item">
                                    <div class="content_aspim scrollbar-inner">
                                        <h3 class="title_schema">{{ __('sparac.aspims.schemas') }}</h3>
                                        {!! $aspim->schemas !!}
                                    </div>

                                    {{--@if($pdf = $aspim->getMedia('document')->first())
                                        <a href="{{ $pdf->getFullUrl() }}" download class="telech_pdf_aspim">
                                            <i class="fa fa-download"></i>
                                            {{ __('sparac.aspims.download_the_schemas') }}
                                        </a>
                                    @endif--}}
                                </div>
                            @endif

                            <div class="item">
                                <div class="content_aspim scrollbar-inner">
                                    <h3 class="title_schema titre_blc_details_aspim">{{ __('sparac.aspims.teritory') }}</h3>
                                    {!! $aspim->teritory !!}
                                </div>
                            </div>

                            <div class="item">
                                <div class="content_aspim scrollbar-inner">
                                    <h3 class="title_schema titre_blc_details_aspim">{{ __('sparac.aspims.physical_features') }}</h3>
                                    {!! $aspim->physical_features !!}
                                </div>
                            </div>

                            <div class="item">
                                <div class="content_aspim scrollbar-inner">
                                    <h3 class="title_schema titre_blc_details_aspim">{{ __('sparac.aspims.mediterranean_importance') }}</h3>
                                    {!! $aspim->mediterranean_importance !!}
                                </div>
                            </div>

                            <div class="item">
                                <div class="content_aspim scrollbar-inner">
                                    <h3 class="title_schema titre_blc_details_aspim">{{ __('sparac.aspims.threats_and_pressures') }}</h3>
                                    {!! $aspim->threats_and_pressures !!}
                                </div>
                            </div>

                            <div class="item">
                                <div class="content_aspim scrollbar-inner">
                                    <h3 class="title_schema titre_blc_details_aspim">{{ __('sparac.aspims.ecological_features') }}</h3>
                                    {!! $aspim->ecological_features !!}
                                </div>
                            </div>

                            <div class="item">
                                <div class="content_aspim scrollbar-inner">
                                    <h3 class="title_schema titre_blc_details_aspim">{{ __('sparac.aspims.management_body') }}</h3>
                                    {!! $aspim->management_body !!}
                                </div>
                            </div>

                            <div class="item">
                                <div class="content_aspim scrollbar-inner">
                                    <h3 class="title_schema titre_blc_details_aspim">{{ __('sparac.aspims.geographic_position') }}</h3>
                                    {!! $aspim->geographic_position !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('front.routes.index', optional($aspim->menu)->slug) }}" class="btn_back_page"><i
                                    class="zmdi zmdi-chevron-left"></i></a>

                    </div>
                </div>
            </div>

        </div>

        {{--<div class="bloc_bas_fiche_aspim">
            <div class="container">
                <div class="row">

                    @if($pdf = $aspim->getMedia('document')->first())
                    <div class="col-xs-8 blc_btn_download_pdf">
                    <a href="{{ $pdf->getFullUrl() }}" download class="btn_download_pdf"><i class="fa fa-download"></i><span>{{ __('sparac.aspims.download_pdf') }}</span></a>
                    </div>
                    @endif
                </div>
            </div>
        </div>--}}

    </section>



    <!-- Modal -->
    <div id="gallerie_aspim" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <a href="{{ url("index.php") }}" class="img_logo_overlay"><img
                                src="{{ asset("/front/assets/images/png/logo.png") }}" alt="ASPIM aire marine, SPARAC"/></a>
                    <button type="button" class="close btn_close_modal" data-dismiss="modal"><i
                                class="zmdi zmdi-close"></i></button>
                    <div class="owl-carousel owl_gallerie_aspim owl-theme">
                        @if (!$aspim->getMedia('aspim_medias')->isEmpty())
                            @foreach($aspim->getMedia('aspim_medias') as $key => $media)
                                <div class="item">
                                    <img src="{{ $media->getFullUrl() }}"/>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="owl_nav_gal">
                        <div class="container">
                            <button type="button" role="presentation" class="owl-prev"><i
                                        class="zmdi zmdi-chevron-left"></i></button>
                            <button type="button" role="presentation" class="owl-next"><i
                                        class="zmdi zmdi-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
