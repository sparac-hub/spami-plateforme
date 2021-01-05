<div class="row" id="myTable">
    @if($procedures->count())
        @foreach($procedures as $procedure)
            @if( !$procedure->getMedia("rapport")->isEmpty())
                <a href="{{ $procedure->getMedia('rapport')->first()->getFullUrl() }}" class="row_gouvernance" download>
                    <div class="col-xs-12 col-sm-3 col-md-2 text-center content_img_gouv">
                        @if (!$procedure->getMedia('file')->isEmpty())
                            <img
                                src={{ $procedure->getMedia('file')->first()->getFullUrl() }} alt="{{ $procedure->getMedia('file')->first()->name }}">
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9">
                        <div class="d_flex_gouvernance">
                            <h2 class="title_gouvernance">
                                {{ $procedure->name }}
                            </h2>
                            <div class="row_content_gouvernance">
                                <span>{{$procedure->meta_description}}</span>
                                <span class="date_desc_gouvernance"><span>{{__('og.procedures.pays')}} : </span>
                                    @if(isset($procedure->aspim_data->countries))
                                        @foreach(optional($procedure->aspim_data)->countries as $country)
                                            {{ $country->name }},
                                        @endforeach
                                        /
                                    @endif
                                    <span>{{__('og.procedures.date')}} : </span>
                                    {{ ($procedure->publication_date)?$procedure->publication_date->format('Y'):''}}</span>
                                <span class="content_gouvernance"><span>{{__('og.procedures.aspim')}}
                                    : </span>{{ optional($procedure->aspim_data)->name }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-1 col-md-1">
                        <div class="icon_download_fiche">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <span class="text_download">Télécharger</span>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    @else
        <span class="title_status txt_bottom">  {{ __('sparac.aspims.no_result') }}</span>
    @endif
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        {{ $procedures->appends(request()->all())->links(front_dir()  .'.layouts.app_partials.pagination') }}
    </div>
</div>
