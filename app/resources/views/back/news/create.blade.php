@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.news.create', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.news.create'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.news.store') }}" method="post" class="form-create" enctype="multipart/form-data">

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
                            <label>{{__('og.news_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]"
                                   value="{{ old($locale.'.name') }}" id="name_{{ $locale }}">
                        </div>


                        <div class="form-group">
                            <label>{{__('og.news_translations.slug')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[slug]"
                                   value="{{ old($locale.'.slug') }}" id="slug_{{ $locale }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('og.news_translations.pays')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[pays]"
                                   value="{{ old($locale.'.pays') }}" id="pays_{{ $locale }}">
                        </div>
                        <div class="form-group">
                            <label>{{__('og.news_translations.description')}}</label>
                            <textarea class="form-control summernote" name="{{$locale}}[description]"
                                      rows="3">{{ old($locale.'.description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.news_translations.image')}} </label>
                            <input type="file" class="form-control" name="{{$locale}}[image]"
                                   value="{{ old($locale.'.image') }}">
                        </div>

                        {{--<div class="form-group">
                            <label>{{__('og.news_translations.content')}} *</label>
                            <textarea class="form-control summernote" class="form-control" name="{{$locale}}[content]"
                                      rows="10">{{ old($locale.'.content') }}</textarea>
                        </div>--}}


                        {{--<div class="form-group">
                            <label>{{__('og.news_translations.meta_title')}} </label>
                            <input type="text" class="form-control" value="{{ old($locale.'.meta_title') }}"
                                   name="{{$locale}}[meta_title]">
                        </div>--}}

                        {{--<div class="form-group">
                            <label>{{__('og.news_translations.meta_description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[meta_description]"
                                      rows="3">{{ old($locale.'.meta_description') }}</textarea>
                        </div>--}}

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <input type="hidden" name="menu_id" value="{{ request('menu_id') }}">

        <div class="form-group">
            <label>{{__('og.news.news_category_id')}}</label>
            <select class="form-control" name="news_category_id">
                <option value="">---</option>
                @if($news_categories)
                    @foreach ($news_categories as $news_category)
                        <option value="{{ $news_category->id }}"
                                @if(old('news_category_id') == $news_category->id) selected @endif
                        >{{ $news_category->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.news.media_album_id')}}</label>
            <select class="form-control" name="media_album_id">
                <option value="">---</option>
                @if($media_albums)
                    @foreach ($media_albums as $media_album)
                        <option value="{{ $media_album->id }}"
                                @if(old('media_album_id') == $media_album->id) selected @endif
                        >{{ $media_album->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.news.start_date')}} *</label>
            <input type="text" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}"
                   autocomplete="false">
        </div>
        <div class="form-group">
            <label>{{__('og.news.end_date')}} *</label>
            <input type="text" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}"
                   autocomplete="false">
        </div>

        <div class="form-group">
            <label>{{__('og.news.is_active')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1" @if(old('is_active') == 1) checked
                               @endif class="icheck"> Activée </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(old('is_active') == 0) checked @endif class="icheck"> Désactivée
                    </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection


@section('js')
    @include('back._common.js.summernote-with-lfm')
    <script>
        $(document).ready(function () {
            function str_slug(value) {
                var pattern = /[\u0600-\u06FF\u0750-\u077F]/;
                if (!pattern.test(value)) {
                    var rExps = [
                        {re: /[\xC0-\xC6]/g, ch: 'A'},
                        {re: /[\xE0-\xE6]/g, ch: 'a'},
                        {re: /[\xC8-\xCB]/g, ch: 'E'},
                        {re: /[\xE8-\xEB]/g, ch: 'e'},
                        {re: /[\xCC-\xCF]/g, ch: 'I'},
                        {re: /[\xEC-\xEF]/g, ch: 'i'},
                        {re: /[\xD2-\xD6]/g, ch: 'O'},
                        {re: /[\xF2-\xF6]/g, ch: 'o'},
                        {re: /[\xD9-\xDC]/g, ch: 'U'},
                        {re: /[\xF9-\xFC]/g, ch: 'u'},
                        {re: /[\xC7-\xE7]/g, ch: 'c'},
                        {re: /[\xD1]/g, ch: 'N'},
                        {re: /[\xF1]/g, ch: 'n'}];

                            {{-- convert chars with accents to normal chars --}}
                    for (var i = 0, len = rExps.length; i < len; i++)
                        value = value.replace(rExps[i].re, rExps[i].ch);

                    return value.toLowerCase()
                        .replace(/\s+/g, '-') {{-- replace ' ' with '-' --}}
                        .replace(/[^a-z0-9-]/g, '') {{-- remove special caracters --}}
                        .replace(/\-{2,}/g, '-'); {{-- remove double '-' --}}
                } else {
                    {{-- For arabic language : add '-' --}}
                        return value.replace(/\s+/g, '-')
                        .replace(/\-{2,}/g, '-');
                }
            }

            @foreach(config('translatable.locales') as $locale)
            $('#name_{{ $locale }}').on("keyup", function () {
                $('#slug_{{ $locale }}').val(str_slug($(this).val()));
            });
            @endforeach

            $("#start_date").datepicker(
                {
                    format: 'yyyy-mm-dd'
                }
            );
            $("#end_date").datepicker(
                {
                    format: 'yyyy-mm-dd'
                }
            );


            if ($('.form-create').length) {
                var form4 = $(".form-create").validate();
            }
        });
    </script>
@endsection
