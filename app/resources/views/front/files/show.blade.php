@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$file->name}}@endsection

@section('meta_description'){{$file->description}}@endsection

@section('main_content')

    <h1>{{ $file->name }}</h1>

    <p>
        {{ $file->description }}
    </p>

@endsection
