@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('main_content')

    <h1>{{ $menu->label }}</h1>

    @foreach($files as $file)

        <h2>{{ $file->name }}</h2>

        <p>
            {{ truncate_html($file->description, 500) }}
        </p>

        @if(isset($file->category))
            <p>
                Categorie: <a href="{{ front_category($file) }}">
                    {{ $file->category->name }}
                </a>
            </p>
        @endif

        @if (!$file->getMedia()->isEmpty())
            <a href="{{ $file->getMedia()->first()->getFullUrl() }}">
                {{ $file->getMedia()->first()->file_name }}
            </a>
        @endif

        @if(isset($file->slug))
            <a href="{{ front_show($file) }}" class="btn btn-primary">Read more</a>
        @endif

        <hr>

    @endforeach

    {{ $files->appends(request()->all())->links(front_dir()  .'.layouts.app_partials.pagination') }}

@endsection
