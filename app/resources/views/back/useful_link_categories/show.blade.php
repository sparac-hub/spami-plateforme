@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.useful_link_categories.show', $useful_link_category->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.useful_link_categories.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.useful_link_categories.is_active')}}</th>
            <td>{!! format_label_is_active($useful_link_category) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.useful_link_categories.title')}}</th>
            <td>{{ $useful_link_category->title }}</td>
        </tr>
        <tr>
            <th>{{__('og.useful_link_categories.slug')}}</th>
            <td>{{ $useful_link_category->slug }}</td>
        </tr>
        <tr>
            <th>{{__('og.useful_link_categories.order')}}</th>
            <td>{{ $useful_link_category->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.useful_link_categories.description')}}</th>
            <td>{{ $useful_link_category->description }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.useful_link_categories.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.useful_link_categories.edit', $useful_link_category->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.useful_link_categories.destroy')
                    <form style="display:inline"
                          action="{{ route('back.useful_link_categories.destroy', $useful_link_category->id) }}"
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


@endsection
