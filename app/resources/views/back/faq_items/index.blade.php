@extends('back.layouts.app')

@section('css')
    @include('back._common.css.datatables')
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
    {{ Breadcrumbs::render('back.faq_items.index', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.faq_items.index'), false) !!}

    @php($where = request('menu_id') ? ['menu_id' => request('menu_id')] : null)

    @can('back.faq_items.create')
        <a href="{{ route('back.faq_items.create', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan

    @can('back.faq_categories.index')
        <a href="{{ route('back.faq_categories.index', ['menu_id' => request('menu_id')]) }}"
           class="btn btn-primary">
            FAQ Categories List
        </a>
    @endcan

    <hr>

    @include('back._common.alerts.messages')


    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.faq_items.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="category.translations.name"
           checked/> {{__('og.faq_items.category')}} |
    <input type="checkbox" class="toggle-vis" data-column="order" checked/> {{__('og.faq_items.order')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.question"
           checked/> {{__('og.faq_item_translations.question')}} |
    <input type="checkbox" class="toggle-vis" data-column="translations.answer"
           checked/> {{__('og.faq_item_translations.answer')}} |

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.faq_items.id')}}</th>
                <th>{{__('og.faq_items.category')}}</th>
                <th>{{__('og.faq_items.order')}}</th>
                <th>{{__('og.faq_item_translations.question')}}</th>
                <th>{{__('og.faq_item_translations.answer')}}</th>
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
    @include('back._common.js.datatables')
    <script>
        $(function () {

            $("[data-toggle=tooltip]").tooltip();

            var table = $('#data-table').DataTable({
                pagingType: "full_numbers",
                processing: true,
                serverSide: true,
                ajax: '{!! route('back.faq_items.index', $where) !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'category', name: 'category.translations.name'},
                    {data: 'order', name: 'order'},
                    {data: 'question', name: 'translations.question', 'orderable': false},
                    {data: 'answer', name: 'translations.answer', 'orderable': false},
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

            {{--$("[data-column='column_id']").trigger( "click" ); --}}

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    @include('back._common.datatables.toggleStatusJs', [
        'route' => 'back.faq_items.index'
    ])
@stop
