@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.training_categories.show', $training_category->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.training_categories.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.training_categories.is_active')}}</th>
            <td>{!! format_label_is_active($training_category) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.training_categories.name')}}</th>
            <td>{{ $training_category->title }}</td>
        </tr>
        <tr>
            <th>{{__('og.training_categories.slug')}}</th>
            <td>{{ $training_category->slug }}</td>
        </tr>
        <tr>
            <th>{{__('og.training_categories.order')}}</th>
            <td>{{ $training_category->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.training_categories.description')}}</th>
            <td>{{ $training_category->description }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.training_categories.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.training_categories.edit', $training_category->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.training_categories.destroy')
                    <form style="display:inline"
                          action="{{ route('back.training_categories.destroy', $training_category->id) }}"
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
