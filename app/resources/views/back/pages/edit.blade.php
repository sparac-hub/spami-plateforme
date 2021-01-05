@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.edit'), false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.pages.update', $page->id) }}" method="post" class="form-create">

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

                        <p>
                            {{ __('og.words.menu') }} :

                            <a href="{{ generate_menu_url_from_obj($page->menu) }}">
                                {{ $page->menu->translateOrNew($locale)->label }}
                            </a>
                            {!! $page->menu->is_active_html !!}
                        </p>

                        <div class="form-group">
                            <label>{{__('og.page_translations.title')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[title]"
                                   value="{{ $page->translateOrNew($locale)->title }}" required>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.page_translations.content')}} </label>
                            <textarea class="form-control summernote" name="{{$locale}}[content]"
                                      rows="3">{{ $page->translateOrNew($locale)->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.page_translations.meta_title')}} </label>
                            <input type="text" class="form-control" name="{{$locale}}[meta_title]"
                                   value="{{ $page->translateOrNew($locale)->meta_title }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.page_translations.meta_description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[meta_description]"
                                      rows="3">{{ $page->translateOrNew($locale)->meta_description }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        {{-- Begin common content --}}

        <button type="submit" class="btn btn-primary">{{__('misc.button.edit')}}</button>

        {{-- End --}}

    </form>


    {!! set_box_foot() !!}

@stop

@section('js')
    @include('back._common.js.summernote-with-lfm')

@stop
