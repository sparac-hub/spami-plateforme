@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$media_album->name}}@endsection

@section('meta_description'){{$media_album->description}}@endsection

@section('og_tags_element')
    @php
        $element = $media_album;
        $hasMedia = true;
    @endphp
    @include('front.layouts.app_partials.tags',["element" => $element,"hasMedia" => $hasMedia])
@endsection

@section('main_content')

    <h1>{{ $media_album->name }}</h1>

    <p>
        {{ $media_album->description }}
    </p>

    @foreach($media_album->files as $file)
        {{ $file->name }}

        {!! $file->getHtmlTag() !!}

        <br>
    @endforeach

@endsection
