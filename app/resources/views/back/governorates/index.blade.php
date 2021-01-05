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

    {!! set_box_head(__('og.box_title.list').'Governorates', false) !!}

    @include('_common.alerts.messages')

    @can('back.governorates.create')
        <a href="{{ route('back.governorates.create') }}"
           class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan

    <hr>

    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.governorates.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="country_id"
           checked/> {{__('og.governorates.country_id')}} |
    <input type="checkbox" class="toggle-vis" data-column="is_active" checked/> {{__('og.governorates.is_active')}} |
    <input type="checkbox" class="toggle-vis" data-column="order" checked/> {{__('og.governorates.order')}} |
    <input type="checkbox" class="toggle-vis" data-column="name"
           checked/> {{__('og.governorate_translations.name')}} |

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.governorates.id')}}</th>
                <th>{{__('og.governorates.country_id')}}</th>
                <th>{{__('og.governorates.is_active')}}</th>
                <th>{{__('og.governorates.order')}}</th>
                <th>{{__('og.governorate_translations.name')}}</th>
                {{--
                <th>{{__('og.created_by')}}</th>
                <th>{{__('og.updated_by')}}</th>
                <th>{{__('og.created_at')}}</th>
                <th>{{__('og.updated_at')}}</th>
                <th>{{__('og.actions')}}</th>
                --}}
            </tr>
            </thead>
        </table>
    </div>

    {!! set_box_foot() !!}

@endsection

@section('js')
    @include('_common.js.datatables')
    <script>
        $(function () {

            $("[data-toggle=tooltip]").tooltip();

            var table = $('#data-table').DataTable({
                pagingType: "full_numbers",
                processing: true,
                serverSide: true,
                ajax: '{!! route('back.governorates.datatables') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'country', name: 'country.translations.name'},
                    {data: 'is_active', name: 'is_active'},
                    {data: 'order', name: 'order'},
                    {data: 'translations', name: 'translations.name'},
                    {{--
                    { data: 'created_by, name: 'created_by' },
                    { data: 'updated_by', name: 'updated_by' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'actions', name: 'actions' },
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
       'route' => 'back.events.index'
   ])
@stop
