@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.faq_items.show', $faq_item->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.faq_items.show') , false) !!}

    @include('back._common.alerts.messages')

    <table class="table table-bordered">
        @if($faq_item->faq_category_id)
            <tr>
                <th>{{__('og.faq_items.category')}}</th>
                <td>
                    <a href="{{ route('back.event_categories.show', $faq_item->faq_category_id) }}">
                        {{ $faq_item->category->name }}
                    </a>
                </td>
            </tr>
        @endif
        <tr>
            <th>{{ __('og.faq_items.is_active') }}</th>
            <td>
                @if($faq_item->is_active)
                    <span class="label label-success">Active</span>
                @else
                    <span class="label label-danger">Inactive</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('og.faq_items.order') }}</th>
            <td>
                {{ $faq_item->order }}
            </td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.faq_items.index')
                    <a class="btn btn-default btn-xs"
                       href="{{route('back.faq_items.index', ['menu_id' => $faq_item->menu_id]) }}"><span
                            class="glyphicon glyphicon-eye-open"></span> FAQ </a>
                @endcan
                @can('back.faq_items.edit')
                    <a class="btn btn-primary btn-xs" href="{{route('back.faq_items.edit', $faq_item->id)}}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.faq_items.destroy')
                    <form style="display:inline" action="{{route('back.faq_items.destroy', $faq_item->id)}}"
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

    <hr>
    <strong>Question:</strong>
    <p>
        {{ strip_tags($faq_item->question) }}
    </p>

    <hr>
    <strong>Answer:</strong>
    <p>
        {{ strip_tags($faq_item->answer) }}
    </p>

    {!! set_box_foot() !!}

@endsection
