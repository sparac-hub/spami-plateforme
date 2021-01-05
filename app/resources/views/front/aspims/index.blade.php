@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('main_content')

@section('header_interne')
    <ul class="box_type_display">
        <li class="list {{ (\Route::currentRouteName() == "front.routes.index")?'active':'' }}">
            <a href="{{ route('front.routes.index', $menu->slug) }}">{{__('og.button.list')}}</a>
        </li>
        <li class="carte {{ (\Route::currentRouteName() == "front.routes.map")?'active':'' }}">
            <a href="{{ route('front.routes.map', $menu->slug) }}">{{__('og.button.map')}}</a>
        </li>
    </ul>
@endsection

<section class="wrap_content_pages">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                @include('front.layouts.app_partials.breadcrumbs')

                @include(front_dir().'.aspims.partials.filter')
            </div>
        </div>
    </div>

    <div class="container_sparac">
        <div class="container-fluid no-padding" id="div_list_index_aspims">
            @include(front_dir().'.aspims.partials.list_index')
        </div>
    </div>
</section>

@endsection

@section('head_pagination')
    {!! $aspims->links(front_dir() . '.layouts.app_partials.head_pagination') !!}
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#keywords').on('keyup', function () {
                var keywords = $(this).val();
                var country = $('#country').val();
                var included_at = $('#included_at').val();

                filter_index(keywords, country, included_at);
            });

            $('#country').on('change', function () {
                var country = $(this).val();
                var keywords = $('#keywords').val();
                var included_at = $('#included_at').val();

                filter_index(keywords, country, included_at);
            });

            $('#included_at').on('keyup', function () {
                var included_at = $(this).val();
                var keywords = $('#keywords').val();
                var country = $('#country').val();

                filter_index(keywords, country, included_at);
            });
        });

        function filter_index(keywords, country, included_at) {
            $.ajax({
                type: 'get',
                url: '{{route('front.routes.index', $menu->slug)}}',
                data: {
                    'keywords': keywords,
                    'country': country,
                    'included_at': included_at,
                },
                success: function (result) {
                    $('#div_list_index_aspims').html(result.view_list);
                }
            });
        }
    </script>
@endsection
