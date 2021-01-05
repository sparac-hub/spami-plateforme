@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.outil_gestion_categories.show', $outil_gestion_category->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.outil_gestion_categories.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.outil_gestion_categories.is_active')}}</th>
            <td>{!! format_label_is_active($outil_gestion_category) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.outil_gestion_categories.name')}}</th>
            <td>{{ $outil_gestion_category->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.outil_gestion_categories.slug')}}</th>
            <td>{{ $outil_gestion_category->slug }}</td>
        </tr>
        <tr>
            <th>{{__('og.outil_gestion_categories.order')}}</th>
            <td>{{ $outil_gestion_category->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.outil_gestion_categories.description')}}</th>
            <td>{{ $outil_gestion_category->description }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.outil_gestion_categories.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.outil_gestion_categories.edit', $outil_gestion_category->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.outil_gestion_categories.destroy')
                    <form style="display:inline"
                          action="{{ route('back.outil_gestion_categories.destroy', $outil_gestion_category->id) }}"
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
