@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.media_albums.edit', $media_album->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.media_albums.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.media_albums.update', $media_album->id) }}" method="post" class="form-create">

        @method('PUT')
        @csrf

        <div class="tabbable-line">
            <ul class="nav nav-tabs">
                @foreach(config('translatable.locales') as $k => $locale)
                    <li class="@if($k==0) active @endif">
                        <a href="#tab_1_{{$locale}}"
                           data-toggle="tab">{{config('translatable.active_locales.'.$locale.'.name')}}
                            <span class="label label-sm @if($k==0) label-default @else label-danger @endif circle">{{ucfirst($locale)}}</span>
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
                            <label>{{__('og.media_album_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]" id="name_{{ $locale }}"
                                   value="{{ old($locale.'.name', $media_album->translateOrNew($locale)->name) }}"
                            >
                        </div>

                        <div class="form-group">
                            <label>{{__('og.media_album_translations.slug')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[slug]" id="slug_{{ $locale }}"
                                   value="{{ old($locale.'.slug', $media_album->translateOrNew($locale)->slug) }}"
                            >
                        </div>

                        <div class="form-group">
                            <label>{{__('og.media_album_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]"
                                      rows="3">{{ old($locale.'.description', $media_album->translateOrNew($locale)->description) }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        {{-- Begin common content --}}

        <div class="form-group">
            <label>{{__('og.media_albums.category')}}</label>
            <select class="form-control" name="media_album_category_id">
                <option value="">---</option>
                @if($media_album_categories)
                    @foreach ($media_album_categories as $media_album_category)
                        <option value="{{ $media_album_category->id }}"
                                @if(old('media_album_category_id', $media_album->media_album_category_id) == $media_album_category->id) selected @endif
                        >{{ $media_album_category->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.media_albums.is_active')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1" @if($media_album->is_active) checked
                               @endif class="icheck"> Activée </label>
                    <label>
                        <input type="radio" name="is_active" value="0" @if(!$media_album->is_active) checked
                               @endif class="icheck"> Désactivée </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.media_albums.order')}} </label>
            <input type="number" class="form-control" name="order" value="{{ old('order', $media_album->order)}}">
        </div>


        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection

@section('js')
    <script src="{{asset('back/assets/apps/scripts/todo-2.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/jquery.validate.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/localization/messages_".locale().".js") }}"
            type="text/javascript"></script>

    @include('back._common.js.summernote-with-lfm')
    @include('_common.js.str_slug')
    @include('_common.js.edit_slug', [
            'module' => 'media_albums',
            'menu' => $media_album
        ])

@endsection
