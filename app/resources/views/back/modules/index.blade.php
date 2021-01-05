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

@section('content')

    {!! set_box_head(__('og.box_title.list').'Modules', false) !!}

    @include('back._common.alerts.messages')


    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.modules.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="name" checked/> {{__('og.modules.name')}} |
    <input type="checkbox" class="toggle-vis" data-column="reference" checked/> {{__('og.modules.reference')}} |
    <input type="checkbox" class="toggle-vis" data-column="is_active" checked/> {{__('og.modules.is_active')}} |
    <input type="checkbox" class="toggle-vis" data-column="is_menu_module"
           checked/> {{__('og.modules.is_menu_module')}} |
    <input type="checkbox" class="toggle-vis" data-column="order" checked/> {{__('og.modules.order')}} |
    <input type="checkbox" class="toggle-vis" data-column="icon" checked/> {{__('og.modules.icon')}} |
    <input type="checkbox" class="toggle-vis" data-column="backend_route"
           checked/> {{__('og.modules.backend_route')}} |

    <input type="checkbox" class="toggle-vis" data-column="frontend_route"
           checked/> {{__('og.modules.frontend_route')}} |
    <input type="checkbox" class="toggle-vis" data-column="is_on_backend_sidebar"
           checked/> {{__('og.modules.is_on_backend_sidebar')}} |

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.modules.id')}}</th>
                <th>{{__('og.modules.name')}}</th>
                <th>{{__('og.modules.reference')}}</th>
                <th>{{__('og.modules.is_active')}}</th>
                <th>{{__('og.modules.is_menu_module')}}</th>
                <th>{{__('og.modules.order')}}</th>
                <th>{{__('og.modules.icon')}}</th>
                <th>{{__('og.modules.backend_route')}}</th>
                <th>{{__('og.modules.frontend_route')}}</th>
                <th>{{__('og.modules.is_on_backend_sidebar')}}</th>
                <th>{{__('og.actions')}}</th>
                {{--
                <th>{{__('og.created_by')}}</th>
                <th>{{__('og.updated_by')}}</th>
                <th>{{__('og.created_at')}}</th>
                <th>{{__('og.updated_at')}}</th>
                --}}
            </tr>
            </thead>
        </table>
    </div>

    {!! set_box_foot() !!}

@endsection

@section('js')
    @include('back._common.js.datatables')
    <script>
        $(function () {

            $("[data-toggle=tooltip]").tooltip();

            var table = $('#data-table').DataTable({
                pagingType: "full_numbers",
                processing: true,
                serverSide: true,
                ajax: '{!! route('back.modules.datatables') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'reference', name: 'reference'},
                    {data: 'is_active', name: 'is_active'},
                    {data: 'is_menu_module', name: 'is_menu_module'},
                    {data: 'order', name: 'order'},
                    {data: 'icon', name: 'icon'},
                    {data: 'backend_route', name: 'backend_route'},
                    {data: 'frontend_route', name: 'frontend_route'},
                    {data: 'is_on_backend_sidebar', name: 'is_on_backend_sidebar'},
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

            $("[data-column='reference']").trigger("click");

        });
    </script>

    @include('back._common.datatables.toggleStatusJs', [
       'route' => 'back.modules.index'
   ])
@stop
