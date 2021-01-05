@extends('back.layouts.app')

@section('css')
    @include('back._common.css.datatables')
@stop

@section('content')

    {!! set_box_head(__('og.box_title.list').'Newsletter_subscriptions', false) !!}

    @include('back._common.alerts.messages')


    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.newsletter_subscriptions.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="email"
           checked/> {{__('og.newsletter_subscriptions.email')}} |

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.newsletter_subscriptions.id')}}</th>
                <th>{{__('og.newsletter_subscriptions.email')}}</th>
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
                ajax: '{!! route('back.newsletter_subscriptions.datatables') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'email', name: 'email'},
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
@stop
