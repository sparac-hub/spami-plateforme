@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.media_album_categories.show', $media_album_category->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.media_album_categories.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.media_album_categories.is_active')}}</th>
            <td>{!! is_active_html($media_album_category->is_active) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.media_album_categories.name')}}</th>
            <td>{{ $media_album_category->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.media_album_categories.slug')}}</th>
            <td>{{ $media_album_category->slug }}</td>
        </tr>
        <tr>
            <th>{{__('og.media_album_categories.order')}}</th>
            <td>{{ $media_album_category->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.media_album_categories.description')}}</th>
            <td>{{ $media_album_category->description }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.media_album_categories.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.media_album_categories.edit', $media_album_category->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.media_album_categories.destroy')
                    <form style="display:inline"
                          action="{{ route('back.media_album_categories.destroy', $media_album_category->id) }}"
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

@endsection
