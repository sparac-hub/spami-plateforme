@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$news->name}}@endsection

@section('meta_description'){{$news->description}}@endsection

@section('og_tags_element')
    @php
        $element = $news;
        $hasMedia = true;
    @endphp
    @include('front.layouts.app_partials.tags',["element" => $element,"hasMedia" => $hasMedia])
@endsection

@section('main_content')
    <section class="wrap_content_pages">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="breadcrumb_spa">
                        @include('front.layouts.app_partials.breadcrumbs')
                    </div>
                </div>
            </div>
        </div>
        <div class="container container_cms">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                    {!! $news->description !!}
                    <div class="container_addthis addthis_inline_share_toolbox_2dwf"></div>
                </div>
            </div>
        </div>
    </section>

@endsection
