@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.details').'Parameter_group' , false) !!}

    @include('back._common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.parameter_groups.name')}}</th>
            <td>{{ $parameter_group->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.parameter_groups.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{route('back.parameter_groups.edit', $parameter_group->id)}}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.parameter_groups.destroy')
                    <form style="display:inline"
                          action="{{route('back.parameter_groups.destroy', $parameter_group->id)}}"
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
