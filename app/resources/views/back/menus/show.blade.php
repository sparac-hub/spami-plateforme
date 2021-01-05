@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.details').'Menu' , false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.menus.is_active')}}</th>
            <td>{!! format_label_is_active($menu) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.menus.order')}}</th>
            <td>{{ $menu->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.menus.menu_group_id')}}</th>
            <td>
                <a href="{{ route('back.menus.index') }}">
                    {{ $menu->menu_group->name }}
                </a>
            </td>
        </tr>
        <tr>
            <th>{{__('og.menus.module_id')}}</th>
            <td>{{ $menu->module_id }}</td>
        </tr>
        <tr>
            <th>{{__('og.menus.parent_id')}}</th>
            <td>{{ $menu->parent_id }}</td>
        </tr>
        <tr>
            <th>{{__('og.menus.link_type_id')}}</th>
            <td>{{ $menu->link_type_id }}</td>
        </tr>
        <tr>
            <th>{{__('og.menus.http_protocol')}}</th>
            <td>{{ $menu->http_protocol }}</td>
        </tr>
        <tr>
            <th>{{__('og.menus.external_link')}}</th>
            <td>{{ $menu->external_link }}</td>
        </tr>
        <tr>
            <th>{{__('og.menus.internal_link')}}</th>
            <td>{{ $menu->internal_link }}</td>
        </tr>
        <tr>
            <th>{{__('og.menus.link_target')}}</th>
            <td>{{ $menu->link_target }}</td>
        </tr>
        <tr>
            <th>{{__('og.menus.icon')}}</th>
            <td>{{ $menu->icon }}</td>
        </tr>
        <tr>
            <th>{{__('og.menus.css_class')}}</th>
            <td>{{ $menu->css_class }}</td>
        </tr>
        <tr>
            <th>{{__('og.menus.image1')}}</th>
            <td>{{ $menu->image1 }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.menus.edit')
                    <a class="btn btn-primary btn-xs" href="{{route('back.menus.edit', $menu->id)}}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.menus.destroy')
                    <form style="display:inline" action="{{route('back.menus.destroy', $menu->id)}}" method="POST">
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
