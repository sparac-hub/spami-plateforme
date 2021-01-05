@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$outil_gestion->name}}@endsection

@section('meta_description'){{$outil_gestion->description}}@endsection

@section('og_tags_element')
    @php
        $element = $outil_gestion;
        $hasMedia = true;
    @endphp
    @include('front.layouts.app_partials.tags',["element" => $element,"hasMedia" => $hasMedia])
@endsection

@section('main_content')

    <h1>{{ $outil_gestion->name }}</h1>

    <p>
        {{ $outil_gestion->content }}
    </p>


    @if (!$outil_gestion->getMedia('outil_gestion_medias')->isEmpty())
        <div class="gallerie">
            <h3>{{__('og.front_filter.discover_latest_images')}}</h3>
            <div class="owl-carousel owl-theme actuality-carousel">
                @foreach($outil_gestion->getMedia('outil_gestion_medias') as $media)
                    <div class="item">
                        <a class="magnific-popup-image" href="{{ $media->getFullUrl() }}">
                            <img src="{{ $media->getFullUrl() }}" alt="{{ $outil_gestion->name }}"/>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection
