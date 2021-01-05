@if($plans->count())
    @foreach($plans as $plan)
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste text-center">
            <img src="{{ asset('front/assets/images/png/blueimg_pdf.png')  }}" class="gouvernance-img">
            <div class="content_fiche_liste">
                @if (!$plan->getMedia()->isEmpty())
                    <a href="{{ $plan->getMedia()->first()->getFullUrl() }}"
                       download="{{ $plan->getMedia()->first()->getFullUrl() }}" target="_blank" class="pdf-gestion">
                        <h2 class="title_liste">
                            {{ $plan->name }}
                            <i aria-hidden="true" class="fa fa-download"></i>
                        </h2>
                    </a>
                @else
                    <h2 class="title_liste">
                        {{ $plan->name }}
                    </h2>
                @endif
            </div>
        </div>
    @endforeach
@else
    <span class="title_status txt_bottom">  {{ __('sparac.aspims.no_result') }}</span>
@endif

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    {{ $plans->appends(request()->all())->links(front_dir()  .'.layouts.app_partials.pagination') }}
</div>

