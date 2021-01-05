@extends('back.layouts.app')

@section('css')
    @include('_common.css.datatables')
    <link href="{{ asset('/back/assets/global/plugins/jquery-nestable/jquery.nestable.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('/back/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <style>
        .dd-handle {
            height: 35px;
        }
    </style>
@stop

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.trainings.index', $menu_id) }}
@endsection

@section('content')

    @php($where = request('menu_id') ? ['menu_id' => request('menu_id')] : null)

    {!! set_box_head(__('breadcrumbs.back.trainings.index'), false) !!}

    @can('back.trainings.create')
        <a href="{{ route('back.trainings.create', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan

    @can('back.training_categories.index')
        <a href="{{ route('back.training_categories.index', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            Training Categories List
        </a>
    @endcan

    <hr>

    @include('_common.alerts.messages')

    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.trainings.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="category.translations.name"
           checked/> {{__('og.trainings.category')}} |
    <input type="checkbox" class="toggle-vis" data-column="url" checked/> {{__('og.trainings.lien_video')}}
    <input type="checkbox" class="toggle-vis" data-column="training_id"
           checked/> {{__('og.training_translations.training_id')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.slug"
           checked/> {{__('og.training_translations.slug')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.name"
           checked/> {{__('og.training_translations.name')}}
    <input type="checkbox" class="toggle-vis" data-column="translations.meta_title"
           checked/> {{__('og.training_translations.meta_title')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.meta_description"
           checked/> {{__('og.training_translations.meta_description')}} |

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.trainings.id')}}</th>
                <th>{{__('og.trainings.category')}}</th>
                <th>{{__('og.trainings.lien_video')}}</th>
                <th>{{__('og.training_translations.slug')}}</th>
                <th>{{__('og.training_translations.name')}}</th>
                <th>{{__('og.training_translations.meta_title')}}</th>
                <th>{{__('og.training_translations.meta_description')}}</th>
                <th>{{__('og.actions')}}</th>
            </tr>
            </thead>
        </table>
    </div>

    {!! set_box_foot() !!}

@endsection

@section('js')
    <script src="{{ asset('/back//assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"
            type="text/javascript"></script>
    @include('_common.js.datatables')
    <script>
        $(function () {

            $("[data-toggle=tooltip]").tooltip();

            var table = $('#data-table').DataTable({
                pagingType: "full_numbers",
                processing: true,
                serverSide: true,
                ajax: '{!! route('back.trainings.index', $where) !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'category', name: 'category.translations.name'},
                    {data: 'url', name: 'url'},
                    {data: 'slug', name: 'translations.slug', 'orderable': false},
                    {data: 'name', name: 'translations.name', 'orderable': false},
                    {data: 'meta_title', name: 'translations.meta_title', 'orderable': false},
                    {data: 'meta_description', name: 'translations.meta_description', 'orderable': false},
                    {data: 'actions', name: 'actions'},
                ],
                "drawCallback": function (settings) {
                    $("[data-toggle=tooltip]").tooltip();
                }
            });

            $('.toggle-vis').on('click', function (e) {
                // Get the column API object
                var column = table.column($(this).attr('data-column') + ':name');
                // Toggle the visibility
                column.visible(!column.visible());
            });

            $("[data-column='translations.slug']").trigger("click");
            $("[data-column='translations.description']").trigger("click");
            $("[data-column='translations.content']").trigger("click");
            $("[data-column='translations.meta_title']").trigger("click");
            $("[data-column='translations.meta_description']").trigger("click");
            $("[data-column='translations.image']").trigger("click");

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    @include('back._common.datatables.toggleStatusJs', [
        'route' => 'back.trainings.index'
    ])
@stop
