@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('main_content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                @include('front.layouts.app_partials.breadcrumbs')

                @include('front.trainings.partials.filter')
            </div>
        </div>
    </div>

    <div class="container_sparac">
        <div class="container-fluid no-padding">
            <div class="row">
                <div id="div_list_index_training">
                    @include('front.trainings.partials.list_index')
                </div>
                @if($trainings->lastPage()>1)
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center" id="show_more_list"
                         rel="{{ $trainings->currentPage() }}">
                        <div class="show_more_list">
                            <i class="zmdi zmdi-plus"></i>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

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
                        $("#show_more_list").attr('rel', 1);
                        $('#div_list_index_training').html(result.view_list);
                        if (!result.is_active) {
                            $("#show_more_list").hide();
                        } else {
                            $("#show_more_list").show();
                        }
                        $('.popup-youtube').magnificPopup({
                            type: 'iframe',
                            mainClass: 'mfp-fade',
                            removalDelay: 160,
                            preloader: false,
                            fixedContentPos: false
                        });
                    }
                });
            });
        });

        $("#show_more_list").on('click', function (e) {
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
                    $('#div_list_index_training').append(ret.view_list);
                }
                $('.popup-youtube').magnificPopup({
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false
                });
            });
        });
    </script>
@endsection
