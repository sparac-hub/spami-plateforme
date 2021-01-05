@foreach($trainings as $training)
    @php


        if(strpos($training->url, 'youtube')) {
            $video_id = '';
            if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i',
            $training->url, $match)) {
            $video_id = $match[1];
               $training->url = 'https://www.youtube.com/watch?v='.$video_id;
            }
        }
    @endphp
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col_fiche_liste">
        <a href="{{ $training->url }}" class="fiche_liste popup-youtube">
            <div class="content_img_liste">
                <div class="img_liste">
                    @if(!empty($video_id))
                        <img src="{{ get_video_image_for_youtube($video_id) }}" alt="">
                    @endif
                </div>
                <div class="content_tag_link">
                    <p class="tag_liste"></p>
                    <span class="link_liste"><i class="zmdi zmdi-play"></i></span>
                </div>
            </div>
            <div class="content_fiche_liste">
                <h2 class="title_liste">
                    {{ $training->name }}
                </h2>
            </div>
        </a>
    </div>
@endforeach

{{--
{{ $trainings->appends(request()->all())->links(front_dir()  .'.layouts.app_partials.pagination') }}--}}
