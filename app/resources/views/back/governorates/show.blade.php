@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.details').'Governorate' , false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.governorates.is_active')}}</th>
            <td>{!! format_label_is_active($governorate) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.governorates.name')}}</th>
            <td>{{ $governorate->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.governorates.country_id')}}</th>
            <td>{{ $governorate->country->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.governorates.order')}}</th>
            <td>{{ $governorate->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                <a class="btn btn-primary btn-xs" href="{{ route('back.governorates.edit', $governorate->id) }}"><span
                        class="glyphicon glyphicon-pencil"></span></a>
                <form style="display:inline" action="{{ route('back.governorates.destroy', $governorate->id) }}"
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
            </td>
        </tr>
    </table>

    {!! set_box_foot() !!}

@endsection
