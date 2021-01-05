@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.partners.show', $partner->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.partners.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.partners.is_active')}}</th>
            <td>{!! format_label_is_active($partner) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.partners.title')}}</th>
            <td>{{ $partner->title }}</td>
        </tr>
        <tr>
            <th>{{__('og.partners.order')}}</th>
            <td>{{ $partner->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.partners.partner_category_id')}}</th>
            <td>{{ isset($partner->category)??$partner->category->title }}</td>
        </tr>
        <tr>
            <th>{{__('og.partners.url')}}</th>
            <td>{{ $partner->protocol.$partner->url }}</td>
        </tr>
        <tr>
            <th>{{__('og.partners.image')}}</th>
            <td><img src="{{ $partner->image }}" width="300"></td>
        </tr>
        <tr>
            <th>{{__('og.partners.description')}}</th>
            <td>{{ strip_tags($partner->description) }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                <a class="btn btn-primary btn-xs" href="{{ route('back.partners.edit', $partner->id) }}"><span
                        class="glyphicon glyphicon-pencil"></span></a>
                <form style="display:inline" action="{{ route('back.partners.destroy', $partner->id) }}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="_method" value="DELETE">
                    <span data-placement="top" data-toggle="tooltip" title="Supprimer">
                            <button class="btn btn-danger btn-xs" type="submit"
                                    onclick="return confirm('{{__('og.alert.confirm_deletion')}}')">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </span>
                </form>
            </td>
        </tr>
    </table>

    {!! set_box_foot() !!}

@endsection
