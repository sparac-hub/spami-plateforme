@extends('back.layouts.app')

@section('css')
    @include('_common.css.datatables')
    <link href="{{ asset('/back/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet"
          type="text/css"/>
@stop

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.news.index', $menu_id) }}
@endsection

@section('content')

    @php($where = request('menu_id') ? ['menu_id' => request('menu_id')] : null)

    {!! set_box_head(__('breadcrumbs.back.news.index'), false) !!}

    @can('back.news.create')
        <a href="{{ route('back.news.create', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan

    @can('back.news_categories.index')
        <a href="{{ route('back.news_categories.index', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            News Categories List
        </a>
    @endcan

    <hr>

    @include('_common.alerts.messages')

    <input type="checkbox" class="toggle-vis" data-column="updated_at" checked/> {{__('og.news.updated_at')}} |
    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.news.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.slug"
           checked/> {{__('og.news_translations.slug')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.name"
           checked/> {{__('og.news_translations.name')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.description"
           checked/> {{__('og.news_translations.description')}}

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.news.updated_at')}}</th>
                <th>{{__('og.news.id')}}</th>
                <th>{{__('og.news_translations.slug')}}</th>
                <th>{{__('og.news_translations.name')}}</th>
                <th>{{__('og.news_translations.description')}}</th>
                <th>{{__('og.actions')}}</th>
                {{--
                <th>{{__('og.news_translations.image')}}</th>
                <th>{{__('og.news_translations.meta_title')}}</th>
                <th>{{__('og.news_translations.meta_description')}}</th>
                <th>{{__('og.news.is_active')}}</th>
                <th>{{__('og.news.category')}}</th>
                <th>{{__('og.created_by')}}</th>
                --}}
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
                "order": [[0, "desc"]],
                pagingType: "full_numbers",
                processing: true,
                serverSide: true,
                ajax: '{!! route('back.news.index', $where) !!}',
                columns: [
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'id', name: 'id'},
                    {data: 'slug', name: 'translations.slug', 'orderable': false},
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

            $("[data-column='translations.slug']").trigger("click");
            $("[data-column='translations.description']").trigger("click");
            $("[data-column='updated_at']").trigger("click");

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    @include('back._common.datatables.toggleStatusJs', [
        'route' => 'back.news.index'
    ])
@stop
