@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.procedure_categories.show', $procedure_category->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.procedure_categories.show'). ' [ Menu : '.$procedure_category->menu->translations->first()->label .' ]' , false) !!}

    @include('back._common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.procedure_category_translations.name')}}</th>
            <td>{{ $procedure_category->name }}</td>
        </tr>
        <tr>
            <th>{{ __('og.files.is_active') }}</th>
            <td>
                @if($procedure_category->is_active)
                    <span class="label label-success">Active</span>
                @else
                    <span class="label label-danger">Inactive</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('og.files.order') }}</th>
            <td>
                {{ $procedure_category->order }}
            </td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                {!! $procedure_category->edit_button !!}
                {!! $procedure_category->delete_button !!}
            </td>
        </tr>
    </table>

    {!! set_box_foot() !!}


@endsection
