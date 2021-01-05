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

    {!! set_box_head(__('og.box_title.list').'Locales', false) !!}

    <a href="{{ route('back.locales.create') }}"
       class="btn btn-primary">
        {{ __('og.button.create') }}
    </a>

    <hr>

    @include('back._common.alerts.messages')


    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.locales.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="reference" checked/> {{__('og.locales.reference')}} |
    <input type="checkbox" class="toggle-vis" data-column="name" checked/> {{__('og.locales.name')}} |
    <input type="checkbox" class="toggle-vis" data-column="is_default" checked/> {{__('og.locales.is_default')}} |
    <input type="checkbox" class="toggle-vis" data-column="is_active" checked/> {{__('og.locales.is_active')}} |
    <input type="checkbox" class="toggle-vis" data-column="is_rtl" checked/> {{__('og.locales.is_rtl')}} |

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.locales.id')}}</th>
                <th>{{__('og.locales.reference')}}</th>
                <th>{{__('og.locales.name')}}</th>
                <th>{{__('og.locales.is_default')}}</th>
                <th>{{__('og.locales.is_active')}}</th>
                <th>{{__('og.locales.is_rtl')}}</th>
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
                ajax: '{!! route('back.locales.datatables') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'reference', name: 'reference'},
                    {data: 'name', name: 'name'},
                    {data: 'is_default', name: 'is_default'},
                    {data: 'is_active', name: 'is_active'},
                    {data: 'is_rtl', name: 'is_rtl'},
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

            {{--$("[data-column='column_id']").trigger( "click" ); --}}

        });
    </script>

    @include('back._common.datatables.toggleStatusJs', [
        'route' => 'back.locales.index'
    ])
@stop
