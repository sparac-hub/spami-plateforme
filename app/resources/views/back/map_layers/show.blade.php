@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.map_layers.show', $map_layer->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.map_layers.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{ __('og.map_layers.is_active') }}</th>
            <td>
                @if($map_layer->is_active)
                    <span class="label label-success">Active</span>
                @else
                    <span class="label label-danger">Inactive</span>
                @endif
            </td>
        </tr>

        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.map_layers.index')
                    <a class="btn btn-default btn-xs"
                       href="{{route('back.map_layers.index', ['menu_id' => $map_layer->menu_id]) }}"><span
                            class="glyphicon glyphicon-eye-open"></span> Map layer </a>
                @endcan
                @can('back.map_layers.edit')
                    <a class="btn btn-primary btn-xs" href="{{route('back.map_layers.edit', $map_layer->id)}}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.map_layers.destroy')
                    <form style="display:inline" action="{{route('back.map_layers.destroy', $map_layer->id)}}"
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
    <strong>{{__('og.map_layers.name')}}:</strong>
    <p>
        {{ $map_layer->name }}
    </p>
    <hr>
    <strong>{{__('og.map_layers.layer')}}:</strong>
    <p>
        {{ $map_layer->layer }}
    </p>

    <hr>
    <strong>{{__('og.map_layers.description')}}:</strong>
    <p>
        {{ $map_layer->description }}
    </p>

    {!! set_box_foot() !!}

@endsection
