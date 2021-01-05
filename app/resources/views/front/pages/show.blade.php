@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('meta_keywords'){{$menu->meta_keywords}}@endsection

@section('main_content')

    <section class="wrap_content_pages">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    @include('front.layouts.app_partials.breadcrumbs')
                </div>
            </div>
        </div>

        {!! $menu->page->content !!}
    </section>

@stop
