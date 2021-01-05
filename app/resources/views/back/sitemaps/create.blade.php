@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.sitemaps.create', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.sitemaps.create'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.sitemaps.store') }}" method="post" class="form-create">

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
                            <input type="text" class="form-control" name="{{$locale}}[title]" id="title_{{ $locale }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.sitemap_translations.slug')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[slug]" id="slug_{{ $locale }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.sitemap_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]" rows="3"></textarea>
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
                <input type="checkbox" name="menu_group_ids[]" value="{{$menu_group->id}}"> {{ $menu_group->reference }}
                <br>
            @endforeach
        </div>

        <div class="form-group">
            <label>{{__('og.sitemaps.is_active')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1" class="icheck"> Activé </label>
                    <label>
                        <input type="radio" name="is_active" value="0" checked class="icheck"> Désactivé </label>
                </div>
            </div>
        </div>

        <input type="hidden" class="form-control" name="menu_id" value="{{ $menu_id }}">

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

    </form>

    {!! set_box_foot()  !!}

@endsection

@section('js')
    @include('_common.js.str_slug')
    <script>
        $(document).ready(function () {

            @foreach(config('translatable.locales') as $locale)
            $('#title_{{ $locale }}').on("keyup", function () {
                $('#slug_{{ $locale }}').val(str_slug($(this).val()));
            });
            @endforeach
        });
    </script>
@endsection
