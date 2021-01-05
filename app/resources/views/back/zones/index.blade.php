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

    {!! set_box_head(__('og.box_title.list').'Zones', false) !!}

    @include('_common.alerts.messages')

    @can('back.zones.create')
        <a href="{{ route('back.zones.create') }}"
           class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan

    <hr>

    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.zones.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="city_id" checked/> {{__('og.zones.city_id')}} |
    <input type="checkbox" class="toggle-vis" data-column="governorate_id"
           checked/> {{__('og.zones.governorate_id')}} |
    <input type="checkbox" class="toggle-vis" data-column="country_id" checked/> {{__('og.zones.country_id')}} |
    <input type="checkbox" class="toggle-vis" data-column="is_active" checked/> {{__('og.zones.is_active')}} |
    <input type="checkbox" class="toggle-vis" data-column="order" checked/> {{__('og.zones.order')}} |
    <input type="checkbox" class="toggle-vis" data-column="name" checked/> {{__('og.zone_translations.name')}} |
    <input type="checkbox" class="toggle-vis" data-column="name" checked/> {{__('og.zones.postal_code')}} |

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.zones.id')}}</th>
                <th>{{__('og.zones.city_id')}}</th>
                <th>{{__('og.zones.governorate_id')}}</th>
                <th>{{__('og.zones.country_id')}}</th>
                <th>{{__('og.zones.is_active')}}</th>
                <th>{{__('og.zones.order')}}</th>
                <th>{{__('og.zone_translations.name')}}</th>
                <th>{{__('og.zones.postal_code')}}</th>
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
                ajax: '{!! route('back.zones.datatables') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'city', name: 'city.translations.name'},
                    {data: 'governorate', name: 'governorate.translations.name'},
                    {data: 'country', name: 'country.translations.name'},
                    {data: 'is_active', name: 'is_active'},
                    {data: 'order', name: 'order'},
                    {data: 'translations', name: 'translations.name'},
                    {data: 'postal_code', name: 'postal_code'},
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
       'route' => 'back.zones.index'
   ])
@stop
