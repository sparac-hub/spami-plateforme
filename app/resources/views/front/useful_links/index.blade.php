@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('main_content')

    <h1>{{ $menu->label }}</h1>

    @if(! $useful_link_categories->isEmpty())

        <form class="form-inline filtrer lien_utiles" action="">
            <label for="email">Filtrer par</label>
            <select class="form-control w-25" id="theme" name="category">
                <option value=""></option>
                @foreach($useful_link_categories as $useful_link_category)
                    <option value="{{ $useful_link_category->id }}"
                            @if(request('category') == $useful_link_category->id) selected @endif
                    >{{ $useful_link_category->title }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn search">Rechercher</button>
        </form>

    @endif


    @if($useful_links->isEmpty())

        <div class="alert alert-info">{{ __('Aucun résultat ne correspond à votre recherche.') }}</div>

    @endif

    @foreach($useful_links as $useful_link)

        <h2>{{ $useful_link->title }}</h2>

        <p>
            {{ truncate_html($useful_link->description, 500) }}
        </p>

        <a href="{{ $useful_link->full_url }}" target="_blank" class="btn btn-primary">Follow Link</a>

        <hr>

    @endforeach

    {{ $useful_links->appends(request()->all())->links(front_dir()  .'.layouts.app_partials.pagination') }}

@endsection
