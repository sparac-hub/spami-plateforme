@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.banners.show') }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.banners.show'), false) !!}

    @include('_common.alerts.messages')

    <table class="table table-bordered">
        <tr>
            <th>{{__('og.banners.is_active')}}</th>
            <td>{!! format_label_is_active($banner) !!}</td>
        </tr>
        <tr>
            <th>{{__('og.banner_translations.back_office_title')}}</th>
            <td>{{ $banner->back_office_title }}</td>
        </tr>
        <tr>
            <th>{{__('og.banner_translations.title')}}</th>
            <td>{{ $banner->title }}</td>
        </tr>
        <tr>
            <th>{{__('og.banner_translations.title_2')}}</th>
            <td>{{ $banner->title_2 }}</td>
        </tr>
        <tr>
            <th>{{__('og.banner_translations.description')}}</th>
            <td>{{ $banner->description }}</td>
        </tr>
        <tr>
            <th>{{__('og.banner_translations.meta_title')}}</th>
            <td>{{ $banner->meta_title }}</td>
        </tr>
        <tr>
            <th>{{__('og.banner_translations.meta_description')}}</th>
            <td>{{ $banner->meta_description }}</td>
        </tr>
        <tr>
            <th>{{__('og.banner_translations.button_title')}}</th>
            <td>{{ $banner->button_title }}</td>
        </tr>
        <tr>
            <th>{{__('og.banners.link_type')}} </th>
            <td> @if($banner->link_type_id == 2) {{__('og.banners.internal_link')}} @elseif($banner->link_type_id == 3) {{__('og.banners.external_link')}} @else {{__('og.banners.no_link')}} @endif</td>
        </tr>
        @if($banner->link_type_id == 3)
            <tr>
                <th>{{__('og.banners.http_protocol')}}</th>
                <td>{{ $banner->http_protocol }}</td>
            </tr>
            <tr>
                <th>{{__('og.banners.external_link')}}</th>
                <td>{{ $banner->external_link }}</td>
            </tr>
        @endif
        @if($banner->link_type_id == 2)
            <tr>
                <th>{{__('og.banners.internal_link')}}</th>
                <td>{{ $banner->internal_link }}</td>
            </tr>
        @endif
        <tr>
            <th>{{__('og.banners.link_target')}}</th>
            <td>{{ $banner->link_target }}</td>
        </tr>
        <tr>
            <th>{{__('og.banners.type')}}</th>
            <td>{{ $banner->type }}</td>
        </tr>
        @if($banner->type == "image_file")
            <tr>
                <th>{{__('og.banners.image_filepath')}}</th>
                <td>{{ $banner->image_filepath }}</td>
            </tr>
        @endif
        @if($banner->type == "video_file")
            <tr>
                <th>{{__('og.banners.video_filepath')}}</th>
                <td>{{ $banner->video_filepath }}</td>
            </tr>
        @endif
        @if($banner->type == "script")
            <tr>
                <th>{{__('og.banners.script')}}</th>
                <td>{{ $banner->script }}</td>
            </tr>
        @endif
        <tr>
            <th>{{__('og.banners.width')}}</th>
            <td>{{ $banner->width }}</td>
        </tr>
        <tr>
            <th>{{__('og.banners.height')}}</th>
            <td>{{ $banner->height }}</td>
        </tr>
        <tr>
            <th>{{__('og.banners.css_class')}}</th>
            <td>{{ $banner->css_class }}</td>
        </tr>
        <tr>
            <th>{{__('og.banners.is_for_mobile')}}</th>
            <td>{{ $banner->is_for_mobile }}</td>
        </tr>
        <tr>
            <th>{{__('og.banners.thumb')}}</th>
            <td>{{ $banner->thumb }}</td>
        </tr>
        <tr>
            <th>{{__('og.actions')}}</th>
            <td>
                @can('back.banners.edit')
                    <a class="btn btn-primary btn-xs" href="{{route('back.banners.edit', $banner->id)}}"><span
                            class="glyphicon glyphicon-pencil"></span></a>
                @endcan
                @can('back.banners.destroy')
                    <form style="display:inline" action="{{route('back.banners.destroy', $banner->id)}}" method="POST">
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
