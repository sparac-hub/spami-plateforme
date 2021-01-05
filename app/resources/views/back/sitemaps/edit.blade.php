@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.sitemaps.edit', $sitemap->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.sitemaps.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.sitemaps.update', $sitemap->id) }}" method="post" class="form-create">

        @method('PUT')
        @csrf

        <div class="tabbable-line">
            <ul class="nav nav-tabs">
                @foreach(config('translatable.locales') as $k => $locale)
                    <li class="@if($k==0) active @endif">
                        <a href="#tab_1_{{$locale}}"
                           data-toggle="tab">{{config('translatable.active_locales.'.$locale.'.name')}}
                            <span
                                    class="label label-sm @if($k==0) label-default @else label-danger @endif circle">{{ucfirst($locale)}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach(config('translatable.locales') as $k => $locale)
                    <div class="tab-pane @if($k==0) active @endif" id="tab_1_{{$locale}}">

                        {{-- Begin translatable content --}}

                        <h1>{{config('translatable.active_locales.'.$locale.'.name')}}</h1>

                        <div class="form-group">
                            <label>{{__('og.sitemap_translations.title')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[title]"
                                   value="{{$sitemap->translateOrNew($locale)->title}}" required>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.sitemap_translations.slug')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[slug]"
                                   value="{{$sitemap->translateOrNew($locale)->slug}}" required>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.sitemap_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]"
                                      rows="3">{{$sitemap->translateOrNew($locale)->description}}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.sitemaps.menu_group_ids')}} </label>
            <br>
            @foreach($menu_groups as $menu_group)
                <input type="checkbox" name="menu_group_ids[]" value="{{$menu_group->id}}"
                       @if(in_array($menu_group->id,$menu_groups_sitemap)) checked @endif > {{ $menu_group->reference }}
                <br>
            @endforeach
        </div>

        <div class="form-group">
            <label>{{__('og.sitemaps.is_active')}} </label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if($sitemap->is_active){{'checked'}}@endif class="icheck"> Activé </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(!$sitemap->is_active){{'checked'}}@endif class="icheck"> Désactivé </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot()  !!}

@endsection
