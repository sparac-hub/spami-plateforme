@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.partner_categories.show', $partner_category->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.partner_categories.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.partners_categories.is_active')}}</th>
            <td>{!! format_label_is_active($partner_category) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.partners_categories.title')}}</th>
            <td>{{ $partner_category->title }}</td>
        </tr>
        <tr>
            <th>{{__('og.partners_categories.slug')}}</th>
            <td>{{ $partner_category->slug }}</td>
        </tr>
        <tr>
            <th>{{__('og.partners_categories.order')}}</th>
            <td>{{ $partner_category->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.partners_categories.description')}}</th>
            <td>{{ $partner_category->description }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.partner_categories.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.partner_categories.edit', $partner_category->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.partner_categories.destroy')
                    <form style="display:inline"
                          action="{{ route('back.partner_categories.destroy', $partner_category->id) }}"
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

    {!! set_box_foot()  !!}


@endsection
