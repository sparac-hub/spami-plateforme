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
    {{ Breadcrumbs::render('back.contact_messages.index') }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.contact_messages.index'), false) !!}

    <a href="{{ route('back.contact_messages.export') }}" class="btn btn-primary">
        <span class="fa fa-download"></span>
        Download Excel
    </a>

    @if(request('menu_id'))

        @can('back.contact_recipients.create')
            <a href="{{ route('back.contact_recipients.create', ['menu_id' => request('menu_id')]) }}"
               class="btn btn-primary">
                {{ __('og.button.create') }} destinataire
            </a>
        @endcan

        @can('back.contact_recipients.index')
            <a href="{{ route('back.contact_recipients.index', ['menu_id' => request('menu_id')]) }}"
               class="btn btn-primary">
                Liste destinataires
            </a>
        @endcan
    @endif

    <hr>

    @include('back._common.alerts.messages')

    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.contact_messages.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="menu" checked/> {{__('og.words.menu')}} |
    <input type="checkbox" class="toggle-vis" data-column="name" checked/> {{__('og.contact_messages.name')}} |
    <input type="checkbox" class="toggle-vis" data-column="first_name"
           checked/> {{__('og.contact_messages.first_name')}} |
    <input type="checkbox" class="toggle-vis" data-column="last_name"
           checked/> {{__('og.contact_messages.last_name')}} |
    <input type="checkbox" class="toggle-vis" data-column="phone" checked/> {{__('og.contact_messages.phone')}} |
    <input type="checkbox" class="toggle-vis" data-column="fax" checked/> {{__('og.contact_messages.fax')}} |
    <input type="checkbox" class="toggle-vis" data-column="address" checked/> {{__('og.contact_messages.address')}} |
    <input type="checkbox" class="toggle-vis" data-column="governorate_id"
           checked/> {{__('og.contact_messages.governorate_id')}} |
    <input type="checkbox" class="toggle-vis" data-column="email" checked/> {{__('og.contact_messages.email')}} |
    <input type="checkbox" class="toggle-vis" data-column="read_at" checked/> {{__('og.contact_messages.read_at')}} |
    <input type="checkbox" class="toggle-vis" data-column="subject" checked/> {{__('og.contact_messages.subject')}} |
    <input type="checkbox" class="toggle-vis" data-column="message" checked/> {{__('og.contact_messages.message')}} |

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.contact_messages.id')}}</th>
                <th>{{__('og.words.menu')}}</th>
                <th>{{__('og.contact_messages.name')}}</th>
                <th>{{__('og.contact_messages.first_name')}}</th>
                <th>{{__('og.contact_messages.last_name')}}</th>
                <th>{{__('og.contact_messages.phone')}}</th>
                <th>{{__('og.contact_messages.fax')}}</th>
                <th>{{__('og.contact_messages.address')}}</th>
                <th>{{__('og.contact_messages.governorate_id')}}</th>
                <th>{{__('og.contact_messages.email')}}</th>
                <th>{{__('og.contact_messages.read_at')}}</th>
                <th>{{__('og.contact_messages.subject')}}</th>
                <th>{{__('og.contact_messages.message')}}</th>
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
    @include('back._common.js.datatables')
    <script>
        $(function () {

            $("[data-toggle=tooltip]").tooltip();

            var table = $('#data-table').DataTable({
                pagingType: "full_numbers",
                processing: true,
                serverSide: true,
                ajax: '{!! route('back.contact_messages.datatables', ['menu_id' => request('menu_id')]) !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'menu', name: 'menu.translations.label'},
                    {data: 'name', name: 'name'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'phone', name: 'phone'},
                    {data: 'fax', name: 'fax'},
                    {data: 'address', name: 'address'},
                    {data: 'governorate_id', name: 'governorate_id'},
                    {data: 'email', name: 'email'},
                    {data: 'read_at', name: 'read_at'},
                    {data: 'subject', name: 'subject'},
                    {data: 'message', name: 'message'},
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
                // Get the column API subject
                var column = table.column($(this).attr('data-column') + ':name');
                // Toggle the visibility
                column.visible(!column.visible());
            });

            $("[data-column='address']").trigger("click");
            $("[data-column='governorate_id']").trigger("click");
            $("[data-column='subject']").trigger("click");
            $("[data-column='message']").trigger("click");

        });
    </script>

    @include('back._common.datatables.toggleStatusJs', [
       'route' => 'back.contact_messages.index'
   ])
@stop
