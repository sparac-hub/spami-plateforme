@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.details').'Zone' , false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.zones.is_active')}}</th>
            <td>{!! format_label_is_active($zone) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.zones.name')}}</th>
            <td>{{ $zone->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.zones.order')}}</th>
            <td>{{ $zone->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.zones.city_id')}}</th>
            <td>{{ $zone->city->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.zones.governorate_id')}}</th>
            <td>{{ $zone->governorate->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.zones.country_id')}}</th>
            <td>{{ $zone->country->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.zones.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.zones.edit', $zone->id) }}"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.zones.destroy')
                    <form style="display:inline" action="{{ route('back.zones.destroy', $zone->id) }}"
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
