@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.file_categories.show', $file_category->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.file_categories.show'). ' [ Menu : '.$file_category->menu->translations->first()->label .' ]' , false) !!}

    @include('back._common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.file_category_translations.name')}}</th>
            <td>{{ $file_category->name }}</td>
        </tr>
        <tr>
            <th>{{ __('og.files.is_active') }}</th>
            <td>
                @if($file_category->is_active)
                    <span class="label label-success">Active</span>
                @else
                    <span class="label label-danger">Inactive</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('og.files.order') }}</th>
            <td>
                {{ $file_category->order }}
            </td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                {!! $file_category->edit_button !!}
                {!! $file_category->delete_button !!}
            </td>
        </tr>
    </table>

    {!! set_box_foot() !!}


@endsection
