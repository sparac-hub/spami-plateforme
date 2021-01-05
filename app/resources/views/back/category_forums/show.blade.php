@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.category_forums.show') }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.category_forums.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.category_forums.name')}}</th>
            <td>{{ $category->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.category_forums.slug')}}</th>
            <td>{{ $category->slug }}</td>
        </tr>
        <tr>
            <th>{{__('og.category_forums.color')}}</th>
            <td>{{ $category->color }}</td>
        </tr>
        <tr>
            <th>{{__('og.category_forums.order')}}</th>
            <td>{{ $category->order }}</td>
        </tr>
        @if($category->parent_id)
            <tr>
                <th>{{__('og.category_forums.parent_id')}}</th>
                <td>{{ $category->parent_id }}</td>
            </tr>
        @endif
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.category_forums.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.category_forums.edit', $category->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.category_forums.destroy')
                    <form style="display:inline" action="{{ route('back.category_forums.destroy', $category->id) }}"
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

    <hr>
    {!! set_box_foot() !!}

@endsection
