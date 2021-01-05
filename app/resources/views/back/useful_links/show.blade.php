@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.useful_links.show', $useful_link->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('og.box_title.details').'Useful_link' , false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.useful_links.is_active')}}</th>
            <td>{!! format_label_is_active($useful_link) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.useful_links.title')}}</th>
            <td>{{ $useful_link->title }}</td>
        </tr>
        <tr>
            <th>{{__('og.useful_links.order')}}</th>
            <td>{{ $useful_link->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.useful_links.useful_link_category_id')}}</th>
            <td>{{ isset($useful_link->category)??$useful_link->category->title }}</td>
        </tr>
        <tr>
            <th>{{__('og.useful_links.url')}}</th>
            <td>{{ $useful_link->protocol.$useful_link->url }}</td>
        </tr>
        <tr>
            <th>{{__('og.useful_links.image')}}</th>
            <td><img src="{{ $useful_link->image }}" width="300"></td>
        </tr>
        <tr>
            <th>{{__('og.useful_links.description')}}</th>
            <td>{{ strip_tags($useful_link->description) }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                <a class="btn btn-primary btn-xs" href="{{ route('back.useful_links.edit', $useful_link->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                <form style="display:inline" action="{{ route('back.useful_links.destroy', $useful_link->id) }}"
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
            </td>
        </tr>
    </table>

    {!! set_box_foot() !!}

@endsection
