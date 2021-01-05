@if($outil_gestions->count())
    @foreach($outil_gestions as $outil_gestion)
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste text-center">
            @if($outil_gestion->type == App\Models\Cms\OutilGestion::GUIDELINE || $outil_gestion->type == App\Models\Cms\OutilGestion::MANUEL)
                <div>
                    <img src="{{ asset('front/assets/images/png/img_pdf.png') }}" class="gouvernance-img">
                    <div class="content_fiche_liste">
                        <h2 class="title_liste">
                            {{ $outil_gestion->name }}
                            @php
                                $document_name = $outil_gestion->type == App\Models\Cms\OutilGestion::GUIDELINE?'file_guideline/'.locale():'file_manuel/'.locale();
                                $media = $outil_gestion->getMedia($document_name);
                            @endphp
                            @if (!$media->isEmpty())
                                <a href="{{ $media->first()->getFullUrl() }}"
                                   target="blank"
                                   download>
                                    <i aria-hidden="true" class="fa fa-download"></i>
                                </a>
                            @endif
                        </h2>
                    </div>
                </div>
            @elseif($outil_gestion->type == App\Models\Cms\OutilGestion::VIDEO)
                {{--video--}}
                <a href="{{ $outil_gestion->url_video }}" class="fiche_liste popup-youtube">
                    <div class="content_img_liste">
                        <div class="img_liste">
                            @php
                                $video_id = '';
                                if
                                (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i',
                                $outil_gestion->url_video, $match)) {
                                $video_id = $match[1];
                                }
                            @endphp
                            @if(!empty($video_id))
                                <img src="{{ get_video_image_for_youtube($video_id) }}" alt="">
                            @endif
                        </div>
                        <div class="content_tag_link">
                            <p class="tag_liste"></p>
                            <span class="link_liste">
                                           <i class="zmdi zmdi-play"></i>
                                        </span>
                        </div>
                    </div>
                    <div class="content_fiche_liste">
                        <h2 class="title_liste">
                            {{ $outil_gestion->name }}
                        </h2>
                    </div>
                </a>

            @elseif($outil_gestion->type == App\Models\Cms\OutilGestion::LIEN)
                {{ $outil_gestion->name }}
            @endif
        </div>
    @endforeach
@else
    <span class="title_status txt_bottom">  {{ __('sparac.aspims.no_result') }}</span>
@endif

{{ $outil_gestions->appends(request()->all())->links(front_dir()  .'.layouts.app_partials.pagination') }}
