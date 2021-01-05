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
    {{ Breadcrumbs::render('back.procedures.index', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.procedures.index'), false) !!}

    @php($where = request('menu_id') ? ['menu_id' => request('menu_id')] : null)

    @include('_common.alerts.messages')

    @can('back.procedures.create')
        <a href="{{ route('back.procedures.create', $where) }}"
           class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan

    @can('back.procedure_categories.index')
        <a href="{{ route('back.procedure_categories.index', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            Procedures Categories
        </a>
    @endcan

    <hr>

    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.procedures.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.name"
           checked/> {{__('og.procedure_translations.name')}} |
    <input type="checkbox" class="toggle-vis" data-column="category.translations.name"
           checked/> {{__('og.procedures.category')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.meta_description"
           checked/> {{__('og.procedure_translations.meta_description')}} |
    <input type="checkbox" class="toggle-vis" data-column="start_date" checked/> {{__('og.procedures.created_at')}} |


    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.procedures.id')}}</th>
                <th>{{__('og.procedure_translations.name')}}</th>
                <th>{{__('og.procedures.category')}}</th>
                <th>{{__('og.procedures.aspim')}}</th>
                <th>{{__('og.procedure_translations.meta_description')}}</th>
                <th>{{__('og.procedures.created_at')}}</th>
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
                ajax: '{!! route('back.procedures.index', $where) !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'translations.name', 'orderable': false},
                    {data: 'category', name: 'category'},
                    {data: 'aspim', name: 'aspim'},

                    {data: 'meta_description', name: 'translations.meta_description', 'orderable': false},
                    {data: 'created_at', name: 'created_at'},

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
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    @include('back._common.datatables.toggleStatusJs', [
        'route' => 'back.procedures.index'
    ])
@stop
