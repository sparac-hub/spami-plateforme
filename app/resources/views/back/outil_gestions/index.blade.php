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
    {{ Breadcrumbs::render('back.outil_gestions.index', $menu_id) }}
@endsection

@section('content')

    @php($where = request('menu_id') ? ['menu_id' => request('menu_id')] : null)

    {!! set_box_head(__('breadcrumbs.back.outil_gestions.index'), false) !!}

    @can('back.outil_gestions.create')
        <a href="{{ route('back.outil_gestions.create', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan

    @can('back.outil_gestion_categories.index')
        <a href="{{ route('back.outil_gestion_categories.index', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            OutilGestion Categories List
        </a>
    @endcan

    <hr>

    @include('_common.alerts.messages')

    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.outil_gestions.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="category.translations.name"
           checked/> {{__('og.outil_gestions.category')}} |
    <input type="checkbox" class="toggle-vis" data-column="aspim.translations.name"
           checked/> {{__('og.outil_gestions.aspim')}} |
    <input type="checkbox" class="toggle-vis" data-column="type" checked/> {{__('og.outil_gestions.type')}} |
    <input type="checkbox" class="toggle-vis" data-column="outil_gestion_id"
           checked/> {{__('og.outil_gestion_translations.outil_gestion_id')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.name"
           checked/> {{__('og.outil_gestion_translations.name')}} |
    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.outil_gestions.id')}}</th>
                <th>{{__('og.outil_gestions.category')}}</th>
                <th>{{__('og.outil_gestions.aspim')}}</th>
                <th>{{__('og.outil_gestions.type')}}</th>
                <th>{{__('og.outil_gestion_translations.name')}}</th>
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
                ajax: '{!! route('back.outil_gestions.index', $where) !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'category', name: 'category.translations.name'},
                    {data: 'aspim', name: 'aspim.translations.name'},
                    {data: 'type', name: 'type'},
                    {data: 'name', name: 'translations.name', 'orderable': false},
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

            $("[data-column='translations.description']").trigger("click");
            $("[data-column='translations.content']").trigger("click");

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    @include('back._common.datatables.toggleStatusJs', [
        'route' => 'back.outil_gestions.index'
    ])
@stop
