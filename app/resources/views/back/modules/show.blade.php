@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.details').'Modules' , false) !!}

    @include('back._common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.modules.is_active')}}</th>
            <td>{!! format_label_is_active($modules) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.modules.name')}}</th>
            <td>{{ $modules->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.modules.order')}}</th>
            <td>{{ $modules->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.modules.icon')}}</th>
            <td>{{ $modules->icon }}</td>
        </tr>
        <tr>
            <th>{{__('og.modules.backend_route')}}</th>
            <td>{{ $modules->backend_route }}</td>
        </tr>
        <tr>
            <th>{{__('og.modules.backend_uri')}}</th>
            <td>{{ $modules->backend_uri }}</td>
        </tr>
        <tr>
            <th>{{__('og.modules.backend_controller')}}</th>
            <td>{{ $modules->backend_controller }}</td>
        </tr>
        <tr>
            <th>{{__('og.modules.backend_action')}}</th>
            <td>{{ $modules->backend_action }}</td>
        </tr>
        <tr>
            <th>{{__('og.modules.frontend_route')}}</th>
            <td>{{ $modules->frontend_route }}</td>
        </tr>
        <tr>
            <th>{{__('og.modules.frontend_uri')}}</th>
            <td>{{ $modules->frontend_uri }}</td>
        </tr>
        <tr>
            <th>{{__('og.modules.frontend_controller')}}</th>
            <td>{{ $modules->frontend_controller }}</td>
        </tr>
        <tr>
            <th>{{__('og.modules.frontend_action')}}</th>
            <td>{{ $modules->frontend_action }}</td>
        </tr>
        <tr>
            <th>{{__('og.modules.is_on_backend_sidebar')}}</th>
            <td>{{ $modules->is_on_backend_sidebar }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.modules.edit')
                    <a class="btn btn-primary btn-xs" href="{{route('back.modules.edit', $modules->id)}}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.modules.destroy')
                    <form style="display:inline" action="{{route('back.modules.destroy', $modules->id)}}" method="POST">
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
