@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('header_interne')
    <ul class="box_type_display">
        @foreach($procedure_categories as $category)
            <li class="list_button {{ ($category->id == request()->category_id)?'active':'' }}">
                <a href="{{ route('front.routes.index', ['slug' => optional($category->menu)->slug, 'category_id' => $category->id]) }}"
                   class="categoryId" value={{$category->id}}>{{$category->name}}</a>
            </li>
        @endforeach
    </ul>
@endsection

@section('main_content')
    <input type="hidden" id="catid" name="category_id" value="{{ request('category_id') }}">

    <section class="wrap_content_pages">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="breadcrumb_spa">
                        @include('front.layouts.app_partials.breadcrumbs')
                    </div>

                    @include(front_dir().'.procedures.partials.filter')
                </div>
            </div>
        </div>

        <div class="container container_gouvernance">
            <div class="loading-ajax"></div>
            <div id="div_list_index_proc">
                @include(front_dir().'.procedures.partials.list_index')
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        $(document).ready(function () {

            $("#included_at").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            }).on("change", function () {
                var date = $(this).val();
                var keywords = $('#keywords').val();
                var aspim = $('#aspim').val();
                var category_id = $('#catid').val();

                filter(keywords, aspim, date, category_id);
            });

            $(".categoryId").on("click", function () {
                $('#catid').val() == $(this).val();
                var category_id = $('#catid').val();
                var aspim = $('#aspim').val();
                var date = $('#included_at').val();
                var keywords = $('#keywords').val();

                filter(keywords, aspim, date, category_id);
            });

            $("#keywords").on("keyup", function () {
                var keywords = $(this).val();
                var aspim = $('#aspim').val();
                var date = $('#included_at').val();
                var category_id = $('#catid').val();

                filter(keywords, aspim, date, category_id);
            });

            $("#aspim").on("change", function () {
                var aspim = $(this).val();
                var keywords = $('#keywords').val();
                var date = $('#included_at').val();
                var category_id = $('#catid').val();

                filter(keywords, aspim, date, category_id);
            });

            $("#included_at").on("keyup", function () {
                var date = $(this).val();
                var keywords = $('#keywords').val();
                var aspim = $('#aspim').val();
                var category_id = $('#catid').val();

                filter(keywords, aspim, date, category_id);
            });
        });

        function filter(keywords, aspim, date, category_id) {
            $('.loading-ajax').show();
            $.ajax({
                url: "{{ route('front.routes.index', ['slug' => $menu->slug]) }}",
                data: {
                    'keywords': keywords,
                    'aspim': aspim,
                    'date': date,
                    'category_id': category_id
                },
                method: 'GET',
                success: function (result) {
                    $('.loading-ajax').hide();
                    $('#div_list_index_proc').html(result.view_list)
                }
            });
        }
    </script>
@endsection
