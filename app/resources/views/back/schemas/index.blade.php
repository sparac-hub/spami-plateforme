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
    {{ Breadcrumbs::render('back.schemas.index') }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.schemas.index'), false) !!}

    @include('_common.alerts.messages')

    @can('back.schemas.create')
        <a href="{{ route('back.schemas.create') }}" class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan
    <hr>

    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.schemas.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="order" checked/> {{__('og.schemas.order')}} |
    <input type="checkbox" class="toggle-vis" data-column="aspim.translations.name"
           checked/>{{__('og.schemas.aspim')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.name" checked/>
    {{__('og.schema_translations.name')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.description" checked/>
    {{__('og.schema_translations.description')}} |

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.schemas.id')}}</th>
                <th>{{__('og.schemas.order')}}</th>
                <th>{{__('og.schemas.aspim')}}</th>
                <th>{{__('og.schema_translations.name')}}</th>
                <th>{{__('og.schema_translations.description')}}</th>
                <th>{{__('og.actions')}}</th>
            </tr>
            </thead>
        </table>
    </div>

    {!! set_box_foot() !!}

@endsection

@section('js')
    <script src="{{ asset('/back//assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript">
    </script>
    @include('_common.js.datatables')
    <script>
        $(function () {

            $("[data-toggle=tooltip]").tooltip();

            var table = $('#data-table').DataTable({
                pagingType: "full_numbers",
                processing: true,
                serverSide: true,
                ajax: '{!! route('back.schemas.index') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'order', name: 'order'},
                    {data: 'aspim', name: 'aspim.translations.name'},
                    {data: 'name', name: 'translations.name', 'orderable': false},
                    {data: 'description', name: 'translations.description', 'orderable': false},
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
    'route' => 'back.schemas.index'
    ])
@stop
