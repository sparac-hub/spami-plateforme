@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.trainings.edit', $training->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.trainings.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.trainings.update', $training->id) }}" method="post" class="form-create">

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
                            <label>{{__('og.training_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]" id="name_{{ $locale }}"
                                   value="{{ old($locale.'.name', $training->translateOrNew($locale)->name) }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.training_translations.slug')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[slug]" id="slug_{{ $locale }}"
                                   value="{{ old($locale.'.slug', $training->translateOrNew($locale)->slug) }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.training_translations.meta_title')}} </label>
                            <input type="text" class="form-control" name="{{$locale}}[meta_title]"
                                   value="{{ old($locale.'.meta_title', $training->translateOrNew($locale)->meta_title) }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.training_translations.meta_description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[meta_description]"
                                      rows="3">{{ old($locale.'.meta_description', $training->translateOrNew($locale)->meta_description) }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        {{-- Begin common content --}}

        <div class="form-group">
            <label>{{__('og.trainings.training_category_id')}}</label>
            <select class="form-control" name="training_category_id">
                <option value="">---</option>
                @foreach ($training_categories as $training_category)
                    <option value="{{ $training_category->id }}"
                            @if(old('training_category_id', $training->category->id ?? null) == $training_category->id) selected @endif
                    >{{ $training_category->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label>{{__('og.trainings.is_active')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if(old('is_active',$training->is_active)) checked @endif
                               class="icheck"> Activée </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(! old('is_active',$training->is_active)) checked @endif
                               class="icheck"> Désactivée </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.trainings.lien_video')}} *</label>
            <input type="url" class="form-control" name="url" value="{{ old('url', $training->url) }}" required
                   placeholder="https://example.com">
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection

@section('js')
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/jquery.validate.min.js") }}"
            type="text/javascript"></script>

    @include('back._common.js.summernote-with-lfm')
    @include('_common.js.str_slug')

    @include('_common.js.edit_slug', [
        'module' => 'trainings',
        'menu' => $training
    ])

    @include('back.media_files.partials.lfm_file_picker')
@endsection
