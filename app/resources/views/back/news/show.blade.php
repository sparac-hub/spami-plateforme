@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.news.show', $news->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.news.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        @if(isset($news->news_category_id))
            <tr>
                <th>{{__('og.news.category')}}</th>
                <td>
                    <a href="{{ route('back.news_categories.show', $news->news_category_id) }}">
                        {{ $news->category->name ?? null}}
                    </a>
                </td>
            </tr>
        @endif
        <tr>
            <th>{{__('og.news.is_active')}}</th>
            <td>{!! format_label_is_active($news) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.news.menu_id')}}</th>
            <td>{!! link_module($news->menu)  !!}</td>
        </tr>
        <tr>
            <th>{{__('og.news.start_date')}}</th>
            <td>{!! carbon($news->start_date)->format('Y-m-d') !!}</td>
        </tr>
        <tr>
            <th>{{__('og.news.slug')}}</th>
            <td>{{ $news->slug }}</td>
        </tr>
        <tr>
            <th>{{__('og.news.name')}}</th>
            <td>{{ $news->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.news.description')}}</th>
            <td>{{ $news->description }}</td>
        </tr>
        <tr>
            <th>{{__('og.news_translations.pays')}}</th>
            <td>{{ $news->pays }}</td>
        </tr>
        <tr>
            <th>{{__('og.news.image')}}</th>
            <td>
                @if ($media = $news->getFirstMedia($news->id.'/'.locale()))
                    <img src="{{ $media->getFullUrl() }}" width="300">
                @endif
            </td>
        </tr>
        {{--        <tr>
                    <th>{{__('og.news.content')}}</th>
                    <td>{{ strip_tags($news->content) }}</td>
                </tr>
                <tr>
                    <th>{{__('og.news.meta_title')}}</th>
                    <td>{{ $news->meta_title }}</td>
                </tr>
                <tr>
                    <th>{{__('og.news.meta_description')}}</th>
                    <td>{{ $news->meta_description }}</td>
                </tr>--}}
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.news.edit')
                    <a class="btn btn-primary btn-xs" href="{{ route('back.news.edit', $news->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.news.destroy')
                    <form style="display:inline" action="{{ route('back.news.destroy', $news->id) }}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="DELETE">
                        <span data-placement="to" data-toggle="tooltip" title="Supprimer">
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
