@if($news->count())
    @foreach($news as $currentNews)
        <a href="{{ front_show($currentNews) }}"
           class="row_gouvernance">
            <div class="col-xs-12 col-sm-3 col-md-2 text-center">
                @if($media = $currentNews->getMedia($currentNews->id.'/'.locale())->first())
                    <img src="{{ $media->getFullUrl() }}">
                @endif
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9">
                <div class="display_news"><span
                        class="date_desc_gouvernance"><span>Pays :</span> {{$currentNews->pays}}
                        / <span>Date :</span>
                        @php
                            set_locale_from_language();
                            echo optional($currentNews->start_date)->formatLocalized('%d %B %Y');
                        @endphp
                            </span>
                    <h2 class="title_gouvernance">
                        {{$currentNews->name}}
                    </h2></div>
            </div>
            <div class="col-xs-12 col-sm-1 col-md-1">
                <div class="icon_more_fiche"><i class="zmdi zmdi-plus"></i></div>
            </div>
        </a>
    @endforeach
@else
    <span class="title_status txt_bottom">  {{ __('sparac.aspims.no_result') }}</span>
@endif

{{ $news->appends(request()->all())->links(front_dir()  .'.layouts.app_partials.pagination') }}
