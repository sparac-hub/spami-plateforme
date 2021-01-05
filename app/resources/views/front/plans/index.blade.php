@extends(front_dir().'.layouts.content_templates.default')

@section('meta_title'){{$menu->meta_title}}@endsection

@section('meta_description'){{$menu->meta_description}}@endsection

@section('main_content')
    <section class="wrap_content_pages">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    @include('front.layouts.app_partials.breadcrumbs')
                    <div class="container_search">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <input type="text" name="keywords" placeholder="{{__('og.plans.recherche')}}"
                                   autocomplete="off"
                                   class="input_recherche" id="keywords"></div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="select_box_spa">
                                <select id="pays_aspim" class="aspim">

                                    <option value=""> {{__('og.plans.aspim')}} </option>
                                    @foreach ($aspims as $aspim)
                                        <option value="{{$aspim->aspim_id}}"> {{$aspim->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container_sparac">
            <div class="container-fluid no-padding">
                <div class="row" id="div_list_index_plan">
                    @include('front.plans.liste_index')
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
                filter(keywords, aspim);
            });

            $(".aspim").on("change", function () {
                var aspim = $(this).val();
                var keywords = $('#keywords').val();

                filter(keywords, aspim);
            });

        });

        function filter(keywords, aspim) {
            $.ajax({
                url: "{{ route('front.routes.index', ['slug' => $menu->slug]) }}",
                data: {
                    'keywords': keywords,
                    'aspim': aspim,
                },
                method: 'GET',
                success: function (result) {
                    $('#div_list_index_plan').html(result.view_list)
                }
            });
        }
    </script>
@endsection
