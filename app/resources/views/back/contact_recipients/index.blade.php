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
    {{ Breadcrumbs::render('back.contact_recipients.index', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('og.box_title.list').'Contact_recipients', false) !!}

    @include('back._common.alerts.messages')

    @if(request('menu_id'))

        @can('back.contact_recipients.create')
            <a href="{{ route('back.contact_recipients.create', ['menu_id' => request('menu_id')]) }}"
               class="btn btn-primary">
                {{ __('og.button.create') }} destinataire
            </a>
        @endcan

        @can('back.contact_messages.index')
            <a href="{{ route('back.contact_messages.index', ['menu_id' => request('menu_id')]) }}"
               class="btn btn-primary">
                Retour au menu
            </a>
        @endcan

        <hr>
    @endif

    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.contact_recipients.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="menu" checked/> {{__('og.words.menu')}} |
    <input type="checkbox" class="toggle-vis" data-column="email" checked/> {{__('og.contact_recipients.email')}} |

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.contact_recipients.id')}}</th>
                <th>{{__('og.words.menu')}}</th>
                <th>{{__('og.contact_recipients.email')}}</th>
                <th>{{__('og.actions')}}</th>
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
                ajax: '{!! route('back.contact_recipients.datatables') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'menu', name: 'menu'},
                    {data: 'email', name: 'email'},
                    {data: 'actions', name: 'actions'},
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
       'route' => 'back.contact_recipients.index'
   ])
@stop
