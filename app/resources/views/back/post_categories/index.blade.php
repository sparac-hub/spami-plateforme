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

    {!! set_box_head(__('og.box_title.list').'Post_categories', false) !!}

    <a href="{{ route('back.post_categories.create') }}"
       class="btn btn-primary">
        {{ __('og.button.create') }}
    </a>

    <hr>

    @include('back._common.alerts.messages')


    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.post_categories.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="name"
           checked/> {{__('og.post_category_translations.name')}} |
    <input type="checkbox" class="toggle-vis" data-column="description"
           checked/> {{__('og.post_category_translations.description')}} |
    <input type="checkbox" class="toggle-vis" data-column="order" checked/> {{__('og.post_categories.order')}} |
    <input type="checkbox" class="toggle-vis" data-column="is_active"
           checked/> {{__('og.post_categories.is_active')}} |
    <input type="checkbox" class="toggle-vis" data-column="menu_id" checked/> {{__('og.post_categories.menu_id')}} |

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.post_categories.id')}}</th>
                <th>{{__('og.post_category_translations.name')}}</th>
                <th>{{__('og.post_category_translations.description')}}</th>
                <th>{{__('og.post_categories.order')}}</th>
                <th>{{__('og.post_categories.is_active')}}</th>
                <th>{{__('og.post_categories.menu_id')}}</th>
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
                ajax: '{!! route('back.post_categories.datatables') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'order', name: 'order'},
                    {data: 'is_active', name: 'is_active'},
                    {data: 'menu_id', name: 'menu_id'},
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

            $("[data-column='description']").trigger("click");

        });
    </script>

    @include('back._common.datatables.toggleStatusJs', [
        'route' => 'back.post_categories.index'
    ])
@stop
