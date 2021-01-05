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
    {{ Breadcrumbs::render('back.programs.index', $menu_id) }}
@endsection

@section('content')

    @php($where = request('menu_id') ? ['menu_id' => request('menu_id')] : null)

    {!! set_box_head(__('breadcrumbs.back.programs.index'), false) !!}

    @include('_common.alerts.messages')

    @can('back.programs.create')
        <a href="{{ route('back.programs.create', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan

    <hr>

    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.programs.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="order" checked/> {{__('og.programs.order')}} |
    {{--    <input type="checkbox" class="toggle-vis" data-column="program_linked_page"--}}
    {{--           checked/> {{__('og.programs.program_linked_page')}} |--}}
    <input type="checkbox" class="toggle-vis" data-column="established_at"
           checked/> {{__('og.programs.established_at')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.title"
           checked/> {{__('og.program_translations.title')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.description"
           checked/> {{__('og.program_translations.description')}} |

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.programs.id')}}</th>
                <th>{{__('og.programs.order')}}</th>
                {{--                <th>{{__('og.programs.program_linked_page')}}</th>--}}
                <th>{{__('og.programs.established_at')}}</th>
                <th>{{__('og.program_translations.title')}}</th>
                <th>{{__('og.program_translations.description')}}</th>
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
                ajax: '{!! route('back.programs.index', $where) !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'order', name: 'order'},
                    // {data: 'program_linked_page', name: 'program_linked_page'},
                    {data: 'established_at', name: 'established_at'},
                    {data: 'title', name: 'translations.title'},
                    {data: 'description', name: 'translations.description'},
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

            $("[data-column='translations.description']").trigger("click");
            $("[data-column='image']").trigger("click");

        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    @include('back._common.datatables.toggleStatusJs', [
        'route' => 'back.programs.index'
    ])
@stop
