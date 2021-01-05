@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.news.edit', $news->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.news.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.news.update', $news->id) }}" method="post" class="form-create"
          enctype="multipart/form-data">

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
                            <label>{{__('og.news_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]" id="name_{{ $locale }}"
                                   value="{{ old($locale.'.name', $news->translateOrNew($locale)->name) }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.news_translations.slug')}} *</label>
                            <input type="text" class="form-control str-slug" name="{{$locale}}[slug]"
                                   id="slug_{{ $locale }}"
                                   value="{{ old($locale.'.slug', $news->translateOrNew($locale)->slug) }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.news_translations.pays')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[pays]"
                                   value="{{ old($locale.'.pays',$news->translateOrNew($locale)->pays) }}"
                                   id="pays_{{ $locale }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.news_translations.description')}}</label>
                            <textarea class="form-control summernote" name="{{$locale}}[description]" rows="3"
                            >{{ old($locale.'.description', $news->translateOrNew($locale)->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            @if (!$news->getMedia($news->id.'/'.$locale)->isEmpty())
                                Uploaded files:
                                @foreach($news->getMedia($news->id.'/'.locale()) as $key => $media)
                                    @if($key <= 2)
                                        <label for="link"> {{ $media->file_name.', ' }} </label>
                                    @endif
                                @endforeach
                                ...
                            @endif
                            <label>{{__('og.news_translations.image')}} </label>
                            <input type="file" class="form-control" name="{{$locale}}[image]"
                                   value="{{ old($locale.'.image', $news->translateOrNew($locale)->image) }}">
                        </div>

                        {{--                        <div class="form-group">
                                                    <label>{{__('og.news_translations.content')}} *</label>
                                                    <textarea class="form-control summernote" name="{{$locale}}[content]"
                                                              rows="3">{{ old($locale.'.content', $news->translateOrNew($locale)->content) }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>{{__('og.news_translations.meta_title')}} </label>
                                                    <input type="text" class="form-control" name="{{$locale}}[meta_title]"
                                                           value="{{ old($locale.'.meta_title', $news->translateOrNew($locale)->meta_title) }}">
                                                </div>

                                                <div class="form-group">
                                                    <label>{{__('og.news_translations.meta_description')}} </label>
                                                    <textarea class="form-control" name="{{$locale}}[meta_description]"
                                                              rows="3">{{ old($locale.'.meta_description', $news->translateOrNew($locale)->meta_description) }}</textarea>
                                                </div>--}}

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        {{-- Begin common content --}}

        <div class="form-group">
            <label>{{__('og.news.news_category_id')}}</label>
            <select class="form-control" name="news_category_id">
                <option value="">---</option>
                @foreach ($news_categories as $news_category)
                    <option value="{{ $news_category->id }}"
                            @if(old('news_category_id', $news->news_category_id) == $news_category->id) selected @endif
                    >{{ $news_category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.news.media_album_id')}}</label>
            <select class="form-control" name="media_album_id">
                <option value="">---</option>
                @foreach ($media_albums as $media_album)
                    <option value="{{ $media_album->id }}"
                            @if(old('media_album_id', $news->media_album_id) == $media_album->id) selected @endif
                    >{{ $media_album->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.news.start_date')}} *</label>
            <input type="text" class="form-control" id="start_date" name="start_date"
                   value="{{ old('start_date', $news->start_date) }}" autocomplete="false">
        </div>
        <div class="form-group">
            <label>{{__('og.news.end_date')}} *</label>
            <input type="text" class="form-control" id="end_date" name="end_date"
                   value="{{ old('start_date', $news->end_date) }}" autocomplete="false">
        </div>

        <div class="form-group">
            <label>{{__('og.news.is_active')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if(old('is_active', $news->is_active)) checked @endif
                               class="icheck"> Activée </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(! old('is_active',$news->is_active)) checked @endif
                               class="icheck"> Désactivée </label>
                </div>
            </div>
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
        'module' => 'news',
        'menu' => $news
    ])
    <script>

        $(function () {
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
        });

    </script>

@endsection
