@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.plan_categories.show', $plan_category->menu_id) }}
@endsection

@section('content')

    {{-- {!! set_box_head(__('breadcrumbs.back.plan_categories.show'). ' [ Menu : '$plan_category->menu->translations->first()->label .' ]' , false) !!} --}}

    @include('back._common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.plan_category_translations.name')}}</th>
            <td>{{ $plan_category->name }}</td>
        </tr>
        <tr>
            <th>{{ __('og.plans.is_active') }}</th>
            <td>
                @if($plan_category->is_active)
                    <span class="label label-success">Active</span>
                @else
                    <span class="label label-danger">Inactive</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('og.plans.order') }}</th>
            <td>
                {{ $plan_category->order }}
            </td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                {!! $plan_category->edit_button !!}
                {!! $plan_category->delete_button !!}
            </td>
        </tr>
    </table>

    {!! set_box_foot() !!}


@endsection
