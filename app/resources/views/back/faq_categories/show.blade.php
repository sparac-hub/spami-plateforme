@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.faq_categories.show', $faq_category->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.faq_categories.show'). ' [ Menu : '.$faq_category->menu->translations->first()->label .' ]' , false) !!}

    @include('back._common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.faq_category_translations.name')}}</th>
            <td>{{ $faq_category->name }}</td>
        </tr>
        <tr>
            <th>{{ __('og.faq_items.is_active') }}</th>
            <td>
                @if($faq_category->is_active)
                    <span class="label label-success">Active</span>
                @else
                    <span class="label label-danger">Inactive</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('og.faq_items.order') }}</th>
            <td>
                {{ $faq_category->order }}
            </td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                {!! $faq_category->edit_button !!}
                {!! $faq_category->delete_button !!}
            </td>
        </tr>
    </table>

    {!! set_box_foot() !!}

@endsection
