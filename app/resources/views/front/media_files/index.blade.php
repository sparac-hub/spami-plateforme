@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('main_content')

    <h1>Media Files</h1>

    @foreach($media_albums as $media_album)

        <h2>{{ $media_album->name }}</h2>

        @if($media_album->image)
            <img src="{{ $media_album->image }}" width="100" height="100">
        @else
            <img src="{{ $media_album->files->first()->url }}" width="100" height="100">
        @endif

        @if(isset($media_album->category))
            <p>
                Category: <a href="{{ front_category($media_album) }}">
                    {{ $media_album->category->name }}
                </a>
            </p>
        @endif

        @if(isset($media_album->slug))
            <a href="{{ front_show($media_album) }}" class="btn btn-primary">Read more</a>
        @endif

        <br>
        <br>
        <hr>

    @endforeach

    {{ $media_albums->appends(request()->all())->links(front_dir()  .'.layouts.app_partials.pagination') }}

@endsection
