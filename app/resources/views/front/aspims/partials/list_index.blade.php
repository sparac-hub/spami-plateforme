<div class="row row_index_aspim">
    @if($aspims->count())
        @foreach($aspims as $aspim)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
                <a href="{{ front_show($aspim) }}" class="fiche_liste">
                    <div class="content_img_liste">
                        <div class="img_liste">
                            @if($image = $aspim->getMedia()->first())
                                <img src="{{ $image->getFullUrl() }}" alt="">
                            @endif
                        </div>
                        <div class="content_tag_link">
                            <p class="tag_liste">
                                @foreach($aspim->countries as $country)
                                    {{ $country->name }}
                                @endforeach
                            </p>
                            <span class="link_liste">
                        <i class="zmdi zmdi-plus"></i>
                    </span>
                        </div>
                    </div>
                    <div class="content_fiche_liste">
                        <h2 class="title_liste">
                            {{ $aspim->name }}
                        </h2>
                        <div class="bottom_listes">
                            <div class="row_status">
                                <span class="title_status">{{ __('sparac.aspims.statut') }}</span>
                                <span class="texte_status">{{ $aspim->status }}</span>
                            </div>

                            <div class="row_status">
                                <span class="title_status">{{ __('sparac.aspims.creation_date') }}</span>
                                <span class="texte_status">{{ $aspim->creation_date }}</span>
                            </div>
                            @if($aspim->included_at)
                                <div class="row_status">
                                    <span class="title_status">{{ __('og.aspims.included_at') }}</span>
                                    <span class="texte_status">{{ $aspim->included_at }}</span>
                                </div>
                            @endif
                            <div class="row_status">
                                <span class="title_status">{{ __('sparac.aspims.creation_text') }}</span>
                                <span class="texte_status">{{ $aspim->creation_text }}</span>
                            </div>
                            <div class="row_status">
                                <span class="title_status">{{ __('sparac.aspims.total_surface_marine') }}</span>
                                <span class="texte_status">{{ $aspim->total_surface_marine }} ha</span>
                            </div>
                            {{-- <div class="row_status">
                                 <span class="title_status">{{ __('sparac.aspims.category') }}</span>
                                 <span class="texte_status">{{ optional($aspim->category)->name }}</span>
                             </div>--}}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @else
        <span class="title_status txt_bottom">  {{ __('sparac.aspims.no_result') }}</span>
    @endif
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        {{ $aspims->appends(request()->all())->links(front_dir()  .'.layouts.app_partials.pagination') }}
    </div>
</div>
