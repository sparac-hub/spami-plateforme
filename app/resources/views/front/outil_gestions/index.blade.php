@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('main_content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                @include('front.layouts.app_partials.breadcrumbs')

                @include('front.outil_gestions.partials.filter')
            </div>
        </div>
    </div>

    <div class="container_sparac">
        <div class="container-fluid no-padding">
            <div class="row" id="div_list_index_outil">
                @include('front.outil_gestions.partials.list_index')
                {{-- <div class="col-xs-12 col-sm-12 col-md-12 text-center" id="show_more_list"
                      rel="{{ $outil_gestions->currentPage() }}">
                     <div class="show_more_list">
                         <i class="zmdi zmdi-plus"></i>
                     </div>
                 </div>--}}
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#keywords').on('keyup', function () {
                var keywords = $(this).val();
                var category = $('#category').val();
                var aspim = $('#aspim').val();

                filter(keywords, aspim, category);
            });

            $("#category").on("change", function () {
                var category = $('#category').val();
                var aspim = $('#aspim').val();
                var keywords = $('#keywords').val();

                filter(keywords, aspim, category);
            });

            $("#aspim").on("change", function () {
                var category = $('#category').val();
                var aspim = $('#aspim').val();
                var keywords = $('#keywords').val();

                filter(keywords, aspim, category);
            });

            function filter(keywords, aspim, category) {
                $.ajax({
                    url: "{{ route('front.routes.index', ['slug' => $menu->slug]) }}",
                    data: {
                        'keywords': keywords,
                        'aspim': aspim,
                        'category': category
                    },
                    method: 'GET',
                    success: function (result) {
                        $('#div_list_index_outil').html(result.view_list)
                    }
                });
            }
        });
    </script>
@endsection
