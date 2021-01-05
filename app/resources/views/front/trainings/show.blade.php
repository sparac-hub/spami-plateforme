@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$news->name}}@endsection

@section('meta_description'){{$news->description}}@endsection

@section('og_tags_element')
    @php
        $element = $training;
        $hasMedia = true;
    @endphp
    @include('front.layouts.app_partials.tags',["element" => $element,"hasMedia" => $hasMedia])
@endsection

@section('main_content')

    <h1>{{ $training->name }}</h1>

    <p>
        {{ $training->description }}
    </p>

@endsection
