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
    {{ Breadcrumbs::render('back.plans.index', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.plans.index'), false) !!}

    @php($where = request('menu_id') ? ['menu_id' => request('menu_id')] : null)

    @include('_common.alerts.messages')

    @can('back.plans.create')
        <a href="{{ route('back.plans.create', $where) }}" class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan

    @can('back.plan_categories.index')
        <a href="{{ route('back.plan_categories.index', ['menu_id' => request('menu_id')]) }}" class="btn btn-primary">
            Plans Categories
        </a>
    @endcan

    <hr>

    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.plans.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="category.translations.name" checked/>
    {{__('og.plans.category')}} |
    <input type="checkbox" class="toggle-vis" data-column="order" checked/> {{__('og.plans.order')}} |
    <input type="checkbox" class="toggle-vis" data-column="aspim.translations.name" checked/>{{__('og.plans.aspim')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.name"
           checked/> {{__('og.plan_translations.name')}}
    |
    <input type="checkbox" class="toggle-vis" data-column="translations.description" checked/>
    {{__('og.plan_translations.description')}} |


    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.plans.id')}}</th>
                <th>{{__('og.plans.category')}}</th>
                <th>{{__('og.plans.order')}}</th>
                <th>{{__('og.plans.aspim')}}</th>
                <th>{{__('og.plan_translations.name')}}</th>
                <th>{{__('og.plan_translations.description')}}</th>
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
                ajax: '{!! route('back.plans.index', $where) !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'category', name: 'category.translations.name'},
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
    'route' => 'back.plans.index'
    ])
@stop
