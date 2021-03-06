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
    {{ Breadcrumbs::render('back.useful_link_categories.index',$menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('og.box_title.list').'Useful_link_categories', false)  !!}

    @include('_common.alerts.messages')

    @can('back.useful_link_categories.create')
        <a href="{{ route('back.useful_link_categories.create', ['menu_id' => $menu_id]) }}"
           class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan

    @can('back.useful_links.index')
        <a href="{{ route('back.useful_links.index', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            Useful links
        </a>
    @endcan

    <hr>

    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.useful_link_categories.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="order"
           checked/> {{__('og.useful_link_categories.order')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.slug"
           checked/> {{__('og.useful_link_category_translations.slug')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.title"
           checked/> {{__('og.useful_link_category_translations.title')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.description"
           checked/> {{__('og.useful_link_category_translations.description')}} |

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.useful_link_categories.id')}}</th>
                <th>{{__('og.useful_link_categories.order')}}</th>
                <th>{{__('og.useful_link_category_translations.slug')}}</th>
                <th>{{__('og.useful_link_category_translations.title')}}</th>
                <th>{{__('og.useful_link_category_translations.description')}}</th>
                <th>{{__('og.actions')}}</th>
            </tr>
            </thead>
        </table>
    </div>

    {!! set_box_foot()  !!}

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
                ajax: '{!! route('back.useful_link_categories.index', ['menu_id' => $menu_id]) !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'order', name: 'order'},
                    {data: 'slug', name: 'translations.slug'},
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

            $("[data-column='slug']").trigger("click");
            $("[data-column='description']").trigger("click");

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    @include('back._common.datatables.toggleStatusJs', [
        'route' => 'back.useful_link_categories.index'
    ])
@stop
