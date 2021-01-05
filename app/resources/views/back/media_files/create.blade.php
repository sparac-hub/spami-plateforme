@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.media_files.create', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.media_files.create'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.media_files.store') }}" method="post" class="form-create"
          enctype="multipart/form-data">

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
                            <label>{{__('og.media_file_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]"
                                   value="{{ old($locale.'.name') }}" id="name_{{ $locale }}"
                            >
                        </div>

                        <div class="form-group">
                            <label>{{__('og.media_file_translations.slug')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[slug]"
                                   value="{{ old($locale.'.slug') }}" id="slug_{{ $locale }}"
                            >
                        </div>

                        <div class="form-group">
                            <label>{{__('og.media_file_translations.description')}}</label>
                            <textarea class="form-control summernote" class="form-control"
                                      name="{{$locale}}[description]"
                                      rows="10">{{ old($locale.'.description') }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <input type="hidden" name="menu_id" value="{{ request('menu_id') }}">

        <div class="form-group">
            <label>{{__('og.media_files.media_album_id')}}</label>
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
            <label>{{__('og.media_files.is_active')}} *</label>
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

        <div class="form-group">
            <label>{{__('og.media_files.order')}} </label>
            <input type="number" class="form-control" name="order">
        </div>

        <div class="form-group">
            <label>{{__('og.banners.type')}}</label>
            <select class="form-control" name="type">
                <option value="0" selected disabled>---</option>
                <option value="{{ \App\Models\Cms\MediaFile::IMAGE }}"
                        @if(old('type') == \App\Models\Cms\MediaFile::IMAGE) selected @endif>Image file
                </option>
                <option value="{{ \App\Models\Cms\MediaFile::VIDEO }}"
                        @if(old('type') == \App\Models\Cms\MediaFile::VIDEO) selected @endif>Video File
                </option>
            </select>
        </div>

        <div id="image_file" style="display: none">
            <div class="input-group">
           <span class="input-group-btn">
             <a id="lfm-image-btn" data-input="lfm-image-thumbnail" data-preview="holder" class="btn btn-primary">
               <i class="fa fa-picture-o"></i> {{__('og.banners.image_filepath')}}
             </a>
           </span>
                <input id="lfm-image-thumbnail" class="form-control" type="text" name="image_filepath"
                       value="{{ old('image_filepath') }}">
            </div>

            <div id="lfm-image">

            </div>
        </div>

        <div id="video_file" style="display: none">
            <div class="input-group">
           <span class="input-group-btn">
             <a id="lfm-video-btn" data-input="lfm-video-thumbnail" data-preview="holder" class="btn btn-primary">
               <i class="fa fa-file-video-o"></i> {{__('og.banners.video_filepath')}}
             </a>
           </span>
                <input id="lfm-video-thumbnail" class="form-control" type="text" name="video_filepath"
                       value="{{ old('video_filepath') }}">
            </div>

            <div id="lfm-video">

            </div>
        </div>

        <br>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection

@section('js')
    @include('back.media_files.partials.lfm_file_picker')
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/localization/messages_".locale().".js") }}"
            type="text/javascript"></script>
    @include('back._common.js.summernote-with-lfm')
    @include('_common.js.str_slug')

    @include('_common.js.create_slug', [
        'module' => 'media_files',
    ])

    <script>

        $('.form-create').validate({
            rules: {
                'media_album_id': {
                    required: true
                }
            }
        });

    </script>
@endsection
