@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.media_files.show', $media_file->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.media_files.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.media_files.album')}}</th>
            <td>
                <a href="{{ route('back.media_albums.show', $media_file->media_album_id) }}">
                    {{ $media_file->album->name }}
                </a>
            </td>
        </tr>
        <tr>
            <th>{{__('og.media_files.is_active')}}</th>
            <td>{!! format_label_is_active($media_file) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.media_files.slug')}}</th>
            <td>{{ $media_file->slug }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.media_files.edit')
                    <a class="btn btn-primary btn-xs" href="{{ route('back.media_files.edit', $media_file->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.media_files.destroy')
                    <form style="display:inline" action="{{ route('back.media_files.destroy', $media_file->id) }}"
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

    <p>
        {!! $media_file->getHtmlTag(400, null) !!}
    </p>

    <strong>{{__('og.media_files.name')}}:</strong>
    <p>
        {{ $media_file->name }}
    </p>

    <hr>
    <strong>{{__('og.media_files.description')}}:</strong>
    <p>
        {{ strip_tags($media_file->description) }}
    </p>

    {!! set_box_foot() !!}

@endsection
