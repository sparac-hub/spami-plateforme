@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('meta_keywords'){{$menu->meta_keywords}}@endsection

@section('main_content')
    <section class="wrap_content_pages">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="breadcrumb_spa">
                        @include('front.layouts.app_partials.breadcrumbs')
                    </div>

                    @include(front_dir().'.gestionnaire_aspim.partials.filter')
                </div>
            </div>
        </div>

        <div class="container_sparac">
            <div class="container-fluid no-padding" id="myTable">
                <div class="row row_gest_aspims" id="div_list_index_gest">
                    @include(front_dir().'.gestionnaire_aspim.partials.list_index')
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        $(document).ready(function () {

            $("#keywords").on("keyup", function () {
                var keywords = $(this).val();
                var aspim = $('#aspim').val();
                var countrie = $('#countrie').val();

                filter(keywords, aspim, countrie);
            });

            $("#aspim").on("change", function () {
                var aspim = $(this).val();
                var keywords = $('#keywords').val();
                var countrie = $('#countrie').val();

                filter(keywords, aspim, countrie);
            });

            $("#countrie").on("change", function () {
                var countrie = $(this).val();
                var keywords = $('#keywords').val();
                var aspim = $('#aspim').val();

                filter(keywords, aspim, countrie);
            });
        });

        function filter(keywords, aspim, countrie) {
            $.ajax({
                url: "{{ route('front.routes.index', ['slug' => $menu->slug]) }}",
                data: {
                    'keywords': keywords,
                    'aspim': aspim,
                    'countrie': countrie,
                },
                method: 'GET',
                success: function (result) {
                    $('#div_list_index_gest').html(result.view_list)
                }
            });
        }
    </script>
@endsection
