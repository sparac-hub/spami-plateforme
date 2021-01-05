@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.details').'City' , false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.cities.country_id')}}</th>
            <td>{{ $city->country->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.cities.governorate_id')}}</th>
            <td>{{ $city->governorate->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.cities.is_active')}}</th>
            <td>{!! format_label_is_active($city) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.cities.order')}}</th>
            <td>{{ $city->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.cities.name')}}</th>
            <td>{{ $city->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.cities.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.cities.edit', $city->id) }}"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.cities.destroy')
                    <form style="display:inline" action="{{ route('back.cities.destroy', $city->id) }}"
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
