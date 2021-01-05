@if($gest_aspims->count())
    @foreach($gest_aspims as $gest_aspim)
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste col_gest_aspims">
            <div href="#?" class="fiche_liste">
                <div class="content_img_liste">
                    @if (!$gest_aspim->getMedia()->isEmpty())
                        <div class="img_liste">
                            <img src="{{ $gest_aspim->getMedia()->first()->getFullUrl() }}"
                                 alt="{{ $gest_aspim->getMedia()->first()->name }}"/>

                        </div>
                    @endif
                    <div class="content_tag_link">
                        <p class="tag_liste">{{ optional($gest_aspim->countrie)->name }}</p>
                    </div>
                </div>
                <div class="content_fiche_liste">
                    <h2 class="title_liste">
                        {{ $gest_aspim->surname.' '.$gest_aspim->name  }}
                    </h2>
                    <div class="bottom_listes">
                        @if(count($gest_aspim->aspims)>0)
                            @foreach ($gest_aspim->aspims as $aspim)
                                <div class="row_status">
                                    <span class="title_status">ASPIM:</span>
                                    <span class="texte_status">{{ $aspim->name }} </span>
                                </div>
                            @endforeach
                        @endif
                        <div class="row_status">
                            <span class="title_status">Email :</span>
                            <a href="mailto:{{ $gest_aspim->email}}" class="texte_status">{{ $gest_aspim->email}}</a>
                        </div>
                        @if($gest_aspim->website)
                            <div class="row_status">
                                <span class="title_status">Site :</span>
                                <a href="{{ $gest_aspim->website}}" target="_blank"
                                   class="texte_status link_status">{{ $gest_aspim->WebsiteLabel}}</a>
                            </div>
                        @endif
                        <div class="row_tel_fiche">
                            <a href="tel:{{ $gest_aspim->tel}}" class="icon_tel_fiche">
                                <i class="fa fa-phone"></i>
                                <span class="num_tel_fiche">{{ $gest_aspim->tel}}</span>
                            </a>
                            <a href="tel:{{ $gest_aspim->skype}}" class="icon_skype_fiche">
                                <i class="zmdi zmdi-skype"></i>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <span class="title_status txt_bottom">  {{ __('sparac.aspims.no_result') }}</span>
@endif
{{--<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <div class="show_more_list">
        <i class="zmdi zmdi-plus"></i>
    </div>
</div>--}}
<div class="col-xs-12 col-sm-12 col-md-12 text-center">

    {{ $gest_aspims->appends(request()->all())->links(front_dir()  .'.layouts.app_partials.pagination') }}
</div>
