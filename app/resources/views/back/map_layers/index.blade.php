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
    {{ Breadcrumbs::render('back.map_layers.index', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.map_layers.index'), false) !!}

    @php($where = request('menu_id') ? ['menu_id' => request('menu_id')] : null)

    @include('_common.alerts.messages')

    @can('back.map_layers.create')
        <a href="{{ route('back.map_layers.create', $where) }}"
           class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan

    <hr>

    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.map_layers.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.name"
           checked/> {{__('og.map_layer_translations.name')}} |
    <input type="checkbox" class="toggle-vis" data-column="start_date" checked/> {{__('og.map_layers.created_at')}} |


    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.map_layers.id')}}</th>
                <th>{{__('og.map_layer_translations.name')}}</th>
                <th>{{__('og.map_layers.created_at')}}</th>
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
                ajax: '{!! route('back.map_layers.index', $where) !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'translations.name', 'orderable': false},
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
        'route' => 'back.map_layers.index'
    ])
@stop
