@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.news_categories.show', $news_category->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.news_categories.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.news_categories.is_active')}}</th>
            <td>{!! format_label_is_active($news_category) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.news_categories.name')}}</th>
            <td>{{ $news_category->title }}</td>
        </tr>
        <tr>
            <th>{{__('og.news_categories.slug')}}</th>
            <td>{{ $news_category->slug }}</td>
        </tr>
        <tr>
            <th>{{__('og.news_categories.order')}}</th>
            <td>{{ $news_category->order }}</td>
        </tr>
        <tr>
            <th>{{__('og.news_categories.description')}}</th>
            <td>{{ $news_category->description }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.news_categories.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.news_categories.edit', $news_category->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.news_categories.destroy')
                    <form style="display:inline"
                          action="{{ route('back.news_categories.destroy', $news_category->id) }}"
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
