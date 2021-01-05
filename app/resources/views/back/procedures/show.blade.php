@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.procedures.show', $procedure->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.procedures.show'), FALSE) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{ __('og.procedures.is_active') }}</th>
            <td>
                @if($procedure->is_active)
                    <span class="label label-success">Active</span>
                @else
                    <span class="label label-danger">Inactive</span>
                @endif
            </td>
        </tr>


        @if (!$procedure->getMedia('file')->isEmpty())
            <tr>
                <th>{{ __('og.procedures.file') }}</th>
                <td>
                    <a href="{{ $procedure->getMedia('file')->first()->getFullUrl() }}" download>
                        {{ $procedure->getMedia('file')->first()->file_name }}
                    </a>
                </td>
            </tr>
        @endif

        @if (!$procedure->getMedia('rapport')->isEmpty())
            <tr>
                <th>{{ __('og.procedures.rapport') }}</th>
                <td>
                    <a href="{{ $procedure->getMedia('rapport')->first()->getFullUrl() }}" download>
                        {{ $procedure->getMedia('rapport')->first()->file_name }}
                    </a>
                </td>
            </tr>
        @endif

        <tr>
            <th>{{ __('og.procedures.date') }}</th>
            <td>
                {{ ($procedure->publication_date)?date('Y', strtotime($procedure->publication_date)):'-' }}
            </td>
        </tr>


        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.procedures.index')
                    <a class="btn btn-default btn-xs"
                       href="{{route('back.procedures.index', ['menu_id' => $procedure->menu_id]) }}"><span
                            class="glyphicon glyphicon-eye-open"></span> Procedure </a>
                @endcan
                @can('back.procedures.edit')
                    <a class="btn btn-primary btn-xs" href="{{route('back.procedures.edit', $procedure->id)}}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.procedures.destroy')
                    <form style="display:inline" action="{{route('back.procedures.destroy', $procedure->id)}}"
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
    <strong>{{__('og.procedures.name')}}:</strong>
    <p>
        {{ $procedure->name }}
    </p>

    <hr>
    <strong>{{__('og.procedures.meta_description')}}:</strong>
    <p>
        {{ $procedure->meta_description }}
    </p>
    <hr>
    <strong>{{__('og.procedures.aspim')}}:</strong>
    <p>
        {{$procedure->aspim_data->name}}
    </p>

    {!! set_box_foot() !!}

@endsection
