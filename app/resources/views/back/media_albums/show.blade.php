@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.media_albums.show', $media_album->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.media_albums.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.media_albums.is_active')}}</th>
            <td>{!! is_active_html($media_album->is_active) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.media_albums.name')}}</th>
            <td>{{ $media_album->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.media_albums.slug')}}</th>
            <td>{{ $media_album->slug }}</td>
        </tr>
        <tr>
            <th>{{__('og.media_albums.order')}}</th>
            <td>{{ $media_album->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.media_albums.category')}}</th>
            <td>
                @if($media_album->media_album_category_id)
                    <a href="{{ route('back.media_album_categories.show', $media_album->media_album_category_id) }}">
                        {{ $media_album->category->name }}
                    </a>
                @endif
            </td>
        </tr>
        <tr>
            <th>{{__('og.media_albums.description')}}</th>
            <td>{{ $media_album->description }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.media_albums.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.media_albums.edit', $media_album->id) }}"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.media_albums.destroy')
                    <form style="display:inline"
                          action="{{ route('back.media_albums.destroy', $media_album->id) }}"
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
