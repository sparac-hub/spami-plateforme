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
    {{ Breadcrumbs::render('back.gestionnaire_aspim.index', $menu_id) }}
@endsection

@section('content')

    @php($where = request('menu_id') ? ['menu_id' => request('menu_id')] : null)

    {!! set_box_head(__('breadcrumbs.back.gestionnaire_aspim.index'), false) !!}

    @can('back.gestionnaire_aspim.create')
        <a href="{{ route('back.gestionnaire_aspim.create', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan


    <hr>

    @include('_common.alerts.messages')

    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.aspims.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.name"
           checked/> {{__('og.gestionnaire_aspim.name')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.email"
           checked/> {{__('og.gestionnaire_aspim.email')}}
    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.gestionnaire_aspim.id')}}</th>
                <th>{{__('og.gestionnaire_aspim.name')}}</th>
                <th>{{__('og.gestionnaire_aspim.email')}}</th>
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
                ajax: '{!! route('back.gestionnaire_aspim.index', $where) !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name', 'orderable': false},
                    {data: 'email', name: 'email', 'orderable': false},
                    {data: 'actions', name: 'actions'},
                    {{--
                    { data: 'created_by, name: 'created_by' },
                    { data: 'updated_by', name: 'updated_by' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    --}}
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

            $("[data-column='name']").trigger("click");
            $("[data-column='email']").trigger("click");

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    @include('back._common.datatables.toggleStatusJs', [
        'route' => 'back.gestionnaire_aspim.index'
    ])
@stop
