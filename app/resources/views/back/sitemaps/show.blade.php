@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.sitemaps.show', $sitemap->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.sitemaps.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.sitemaps.is_active')}}</th>
            <td>{!! format_label_is_active($sitemap) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.sitemaps.title')}}</th>
            <td>{{ $sitemap->title }}</td>
        </tr>
        <tr>
            <th>{{__('og.sitemaps.slug')}}</th>
            <td>{{ $sitemap->slug }}</td>
        </tr>
        <tr>
            <th>{{__('og.sitemaps.menu_group_ids')}}</th>
            <td>
                @foreach($sitemap->getMenuGroups() as $menuGroup)
                    {{ $menuGroup->name }}
                    <br>
                @endforeach
            </td>
        </tr>
        <tr>
            <th>{{__('og.sitemaps.description')}}</th>
            <td>{{ $sitemap->description }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.sitemaps.edit')
                    <a class="btn btn-primary btn-xs"
                       href="{{ route('back.sitemaps.edit', $sitemap->id) }}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.sitempas.destroy')
                    <form style="display:inline"
                          action="{{ route('back.sitemaps.destroy', $sitemap->id) }}"
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
