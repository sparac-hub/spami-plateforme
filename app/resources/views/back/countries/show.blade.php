@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.details').'Country' , false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.countries.is_active')}}</th>
            <td>{!! format_label_is_active($country) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.countries.order')}}</th>
            <td>{{ $country->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.countries.name')}}</th>
            <td>{{ $country->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.countries.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.countries.edit', $country->id) }}"><span
                                class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.countries.destroy')
                    <form style="display:inline"
                          action="{{ route('back.countries.destroy', $country->id) }}" method="POST">
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
