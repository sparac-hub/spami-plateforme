@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.files.show', $file->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.files.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{ __('og.files.is_active') }}</th>
            <td>
                @if($file->is_active)
                    <span class="label label-success">Active</span>
                @else
                    <span class="label label-danger">Inactive</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('og.files.order') }}</th>
            <td>
                {{ $file->order }}
            </td>
        </tr>
        @if (!$file->getMedia()->isEmpty())
            <tr>
                <th>{{ __('og.files.file') }}</th>
                <td>
                    <a href="{{ $file->getMedia()->first()->getFullUrl() }}" download>
                        {{ $file->getMedia()->first()->file_name }}
                    </a>
                </td>
            </tr>
        @endif
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.files.index')
                    <a class="btn btn-default btn-xs"
                       href="{{route('back.files.index', ['menu_id' => $file->menu_id]) }}"><span
                            class="glyphicon glyphicon-eye-open"></span> File </a>
                @endcan
                @can('back.files.edit')
                    <a class="btn btn-primary btn-xs" href="{{route('back.files.edit', $file->id)}}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.files.destroy')
                    <form style="display:inline" action="{{route('back.files.destroy', $file->id)}}" method="POST">
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
    <strong>{{__('og.files.name')}}:</strong>
    <p>
        {{ $file->name }}
    </p>

    <hr>
    <strong>{{__('og.files.description')}}:</strong>
    <p>
        {{$file->description}}
    </p>

    {!! set_box_foot() !!}

@endsection
