@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$procedure->name}}@endsection

@section('meta_description'){{$procedure->description}}@endsection

@section('og_tags_element')
    @php
        $element = $procedure;
        $hasMedia = true;
    @endphp
    @include('front.layouts.app_partials.tags',["element" => $element,"hasMedia" => $hasMedia])
@endsection

@section('main_content')

    <h1>{{ $procedure->name }}</h1>

    <p>
        {{ $procedure->description }}
    </p>

@endsection
