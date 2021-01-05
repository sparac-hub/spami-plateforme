@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('main_content')

    <section class="wrap_content_pages">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="breadcrumb_spa">
                        @include('front.layouts.app_partials.breadcrumbs')
                    </div>

                    @include('front.news.partials.filter')
                </div>
            </div>
        </div>
        <div class="container container_gouvernance">
            <div class="row">
                <div id="div_list_index_news">
                    @include('front.news.partials.list_index')
                </div>
            </div>
        </div>
    </section>

@endsection


@section('js')
    <script>
        $(document).ready(function () {
            $('.input_recherche').on('keyup', function () {
                $keywords = $(this).val();

                $.ajax({
                    type: 'get',
                    url: '{{route('front.routes.index', $menu->slug)}}',
                    data: {'keywords': $keywords},
                    success: function (result) {
                        $('#div_list_index_news').html(result.view_list);
                    }
                });
            });

            $('#date').on('change', function () {
                $start_date = $(this).val();

                $.ajax({
                    type: 'get',
                    url: '{{route('front.routes.index', $menu->slug)}}',
                    data: {'start_date': $start_date},
                    success: function (result) {
                        $('#div_list_index_news').html(result.view_list);
                    }
                });
            });
            $('#pays').on('change', function () {
                $category = $(this).val();

                $.ajax({
                    type: 'get',
                    url: '{{route('front.routes.index', $menu->slug)}}',
                    data: {'category_id': $category},
                    success: function (result) {
                        $('#div_list_index_news').html(result.view_list);
                    }
                });
            });
        });

        /* $("#show_more_list").on('click', function (e) {
             e.preventDefault();
             var that = $(this);
             var next = parseInt(that.attr('rel')) + 1;
             that.hide();
             $('.loading').show();
             $.ajax({
                 method: "get",
                 url: "{{ route('front.routes.index', $menu->slug) }}",
                data: {
                    page: next,
                    keywords: $('.input_recherche').val()
                },
            }).done(function (ret) {
                that.show();
                $('.loading').hide();

                if (ret.status == 'ok') {
                    that.attr('rel', next);
                    if (!ret.is_active) {
                        that.hide();
                    } else {
                        that.show();
                    }
                    that.closest('div').before(ret.view_list);
                }
                $('.image-link').magnificPopup({
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            });
        });*/
    </script>
@endsection

