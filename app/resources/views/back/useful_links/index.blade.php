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
    {{ Breadcrumbs::render('back.useful_links.index', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('og.box_title.list').'Useful_links', false) !!}

    @include('_common.alerts.messages')

    @can('back.useful_links.create')
        <a href="{{ route('back.useful_links.create', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan

    @can('back.useful_link_categories.index')
        <a href="{{ route('back.useful_link_categories.index', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            Useful Links Categories
        </a>
    @endcan

    <hr>

    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.useful_links.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="order" checked/> {{__('og.useful_links.order')}} |
    <input type="checkbox" class="toggle-vis" data-column="useful_link_category_id"
           checked/> {{__('og.useful_links.useful_link_category_id')}} |
    <input type="checkbox" class="toggle-vis" data-column="protocol" checked/> {{__('og.useful_links.protocol')}} |
    <input type="checkbox" class="toggle-vis" data-column="protocol" checked/> {{__('og.useful_links.url')}} |
    <input type="checkbox" class="toggle-vis" data-column="image" checked/> {{__('og.useful_links.image')}} |
    <input type="checkbox" class="toggle-vis" data-column="title"
           checked/> {{__('og.useful_link_translations.title')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.description"
           checked/> {{__('og.useful_link_translations.description')}} |

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.useful_links.id')}}</th>
                <th>{{__('og.useful_links.order')}}</th>
                <th>{{__('og.useful_links.useful_link_category_id')}}</th>
                <th>{{__('og.useful_links.protocol')}}</th>
                <th>{{__('og.useful_links.url')}}</th>
                <th>{{__('og.useful_links.image')}}</th>
                <th>{{__('og.useful_link_translations.title')}}</th>
                <th>{{__('og.useful_link_translations.description')}}</th>
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
                ajax: '{!! route('back.useful_links.index', ['menu_id' => $menu_id]) !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'order', name: 'order'},
                    {data: 'category', name: 'category.translations.title'},
                    {data: 'protocol', name: 'protocol'},
                    {data: 'url', name: 'url'},
                    {data: 'image', name: 'image'},
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
        'route' => 'back.useful_links.index'
    ])
@stop
