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
    {{ Breadcrumbs::render('back.aspims.index', $menu_id) }}
@endsection

@section('content')

    @php($where = request('menu_id') ? ['menu_id' => request('menu_id')] : null)

    {!! set_box_head(__('breadcrumbs.back.aspims.index'), false) !!}

    @can('back.aspims.create')
        <a href="{{ route('back.aspims.create', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan

    @can('back.aspim_categories.index')
        <a href="{{ route('back.aspim_categories.index', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            Aspim Categories List
        </a>
    @endcan

    <hr>

    @include('_common.alerts.messages')

    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.aspims.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="category.translations.name"
           checked/> {{__('og.aspims.category')}} |
    <input type="checkbox" class="toggle-vis" data-column="aspim_id"
           checked/> {{__('og.aspim_translations.aspim_id')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.name"
           checked/> {{__('og.aspim_translations.name')}}

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.aspims.id')}}</th>
                <th>{{__('og.aspims.category')}}</th>
                <th>{{__('og.aspim_translations.name')}}</th>
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
                ajax: '{!! route('back.aspims.index', $where) !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'category', name: 'category.translations.name'},
                    {data: 'name', name: 'translations.name', 'orderable': false},
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
        'route' => 'back.aspims.index'
    ])
@stop
