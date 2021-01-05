@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.media_album_categories.edit', $media_album_category->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.media_album_categories.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.media_album_categories.update', $media_album_category->id) }}" method="post"
          class="form-create">

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
                            <label>{{__('og.media_album_category_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]" id="name_{{ $locale }}"
                                   value="{{ old($locale.'.name', $media_album_category->translateOrNew($locale)->name) }}"
                            >
                        </div>

                        <div class="form-group">
                            <label>{{__('og.media_album_category_translations.slug')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[slug]" id="slug_{{ $locale }}"
                                   value="{{ old($locale.'.slug', $media_album_category->translateOrNew($locale)->slug) }}"
                            >
                        </div>

                        <div class="form-group">
                            <label>{{__('og.media_album_category_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]"
                                      rows="3">{{ old($locale.'.description', $media_album_category->translateOrNew($locale)->description) }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        {{-- Begin common content --}}

        <div class="form-group">
            <label>{{__('og.media_albums.is_active')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1" @if($media_album_category->is_active) checked
                               @endif class="icheck"> Activée </label>
                    <label>
                        <input type="radio" name="is_active" value="0" @if(!$media_album_category->is_active) checked
                               @endif class="icheck"> Désactivée </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.media_album_categories.order')}} </label>
            <input type="number" class="form-control" name="order"
                   value="{{ old('order', $media_album_category->order)}}">
        </div>


        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection

@section('js')
    @include('_common.js.str_slug')
    @include('_common.js.edit_slug', [
        'module' => 'media_album_categories',
        'menu' => $media_album_category
    ])
@endsection
