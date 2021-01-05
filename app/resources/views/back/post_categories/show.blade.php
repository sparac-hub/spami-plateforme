@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.details').'Post_category' , false) !!}

    @include('back._common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.post_categories.is_active')}}</th>
            <td>{!! format_label_is_active($post_category) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.post_category_translations.name')}}</th>
            <td>{{ $post_category->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.post_categories.order')}}</th>
            <td>{{ $post_category->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.post_category_translations.description')}}</th>
            <td>{{ $post_category->description }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.post_categories.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{route('back.post_categories.edit', $post_category->id)}}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.post_categories.destroy')
                    <form style="display:inline"
                          action="{{route('back.post_categories.destroy', $post_category->id)}}"
                          method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="DELETE">
                        <span data-placement="top" data-toggle="tooltip" title="Supprimer">
                            <button class="btn btn-danger btn-xs" type="submit"
                                    onclick="return confirm('{{__('og.alert.confirm_deletion')}}')">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </span>
                    </form>
                @endcan
            </td>
        </tr>
    </table>

    {!! set_box_foot() !!}

    {!! set_box_head(__('og.box_title.list').'Posts', false) !!}

    @can('back.posts.create')
        <a href="{{ route('back.posts.create', ['post_category_id' => $post_category->id]) }}"
           class="btn btn-primary">
            {{ __('og.button.create') }}
        </a>
    @endcan

    @can('back.post_categories.index')
        <a href="{{ route('back.post_categories.index') }}"
           class="btn btn-primary">
            Post Categories List
        </a>
    @endcan

    <hr>

    @include('back._common.alerts.messages')


    <input type="checkbox" class="toggle-vis" data-column="id" checked/> {{__('og.posts.id')}} |
    <input type="checkbox" class="toggle-vis" data-column="title" checked/> {{__('og.posts.title')}} |
    <input type="checkbox" class="toggle-vis" data-column="is_active" checked/> {{__('og.posts.is_active')}} |

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.posts.id')}}</th>
                <th>{{__('og.posts.title')}}</th>
                <th>{{__('og.posts.is_active')}}</th>
                <th>{{__('og.actions')}}</th>
                {{--
                <th>{{__('og.created_by')}}</th>
                <th>{{__('og.updated_by')}}</th>
                <th>{{__('og.created_at')}}</th>
                <th>{{__('og.updated_at')}}</th>
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
                ajax: '{!! route('back.posts.datatables', ['post_category_id' => $post_category->id]) !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'is_active', name: 'is_active'},
                    {data: 'actions', name: 'actions'},
                    {{--
                    { data: 'created_by, name: 'created_by' },
                    { data: 'updated_by', name: 'updated_by' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
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
