@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.banners.create') }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.banners.create'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.banners.store') }}" method="post" class="form-create">

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
                            <label>{{__('og.banner_translations.back_office_title')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[back_office_title]"
                                   value="{{ old($locale.'.back_office_title') }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.banner_translations.title')}}</label>
                            <input type="text" class="form-control" name="{{$locale}}[title]"
                                   value="{{ old($locale.'.title') }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.banner_translations.title_2')}}</label>
                            <input type="text" class="form-control" name="{{$locale}}[title_2]"
                                   value="{{ old($locale.'.title_2') }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.banner_translations.description')}}</label>
                            <textarea class="form-control summernote" name="{{$locale}}[description]" rows="3"
                            >{{ old($locale.'.description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.banner_translations.meta_title')}}</label>
                            <input type="text" class="form-control" name="{{$locale}}[meta_title]"
                                   value="{{ old($locale.'.meta_title') }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.banner_translations.meta_description')}}</label>
                            <textarea class="form-control" name="{{$locale}}[meta_description]" rows="3"
                            >{{ old($locale.'.meta_description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.banner_translations.button_title')}}</label>
                            <input type="text" class="form-control" name="{{$locale}}[button_title]"
                                   value="{{ old($locale.'.button_title') }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.menus.link_type_id')}}</label>
                            <select class="form-control" data-locale="{{$locale}}" name="{{$locale}}[link_type_id]"
                                    id="link_type_id_{{$locale}}">
                                <option value="">Sélectionnez le type de contenu</option>
                                @foreach(config('cms.link_types_banner') as $id => $name)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="link_type_{{$locale}}">
                            @if (old($locale.'.link_type_id') == 1)
                                @include('back.banners.form.menu')
                            @elseif (old($locale.'.link_type_id') == 2)
                                @include('back.banners.form.internal_link')
                            @elseif (old($locale.'.link_type_id') == 3)
                                @include('back.banners.form.external_link')
                            @endif
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>


        <div class="form-group">
            <label>{{__('og.banners.css_class')}}</label>
            <input type="text" class="form-control" name="css_class" value="{{ old('css_class') }}">
        </div>

        {{--<div class="form-group">
            <label>{{__('og.banners.is_for_mobile')}}</label>
            <select class="form-control" name="is_for_mobile">
                <option value="0" @if(old('is_for_mobile') == 0) selected @endif>Non</option>
                <option value="1" @if(old('is_for_mobile') == 1) selected @endif>Oui</option>
            </select>
        </div>--}}

        <div class="form-group">
            <label>{{__('og.banners.is_active')}}</label>
            <select class="form-control" name="is_active">
                <option value="0" @if(old('is_active') == 0) selected @endif>Non</option>
                <option value="1" @if(old('is_active') == 1) selected @endif>Oui</option>
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.banners.width')}}</label>
            <input type="text" class="form-control" name="width" value="{{ old('width') }}">
        </div>

        <div class="form-group">
            <label>{{__('og.banners.height')}}</label>
            <input type="text" class="form-control" name="height" value="{{ old('height') }}">
        </div>

        {{--
        <div class="form-group">
            <label>{{__('og.banners.thumb')}}</label>
            <input type="text" class="form-control" name="thumb" value="{{ old('thumb') }}">
        </div>
        --}}

        <div class="form-group">
            <label>{{__('og.banners.type')}}</label>
            <select class="form-control" name="type">
                <option value="html" selected>HTML</option>
                <option value="image_file" @if(old('type') == \App\Models\Cms\Banner::TYPE_IMAGE) selected @endif>Image
                    file
                </option>
                <option value="video_file" @if(old('type') == \App\Models\Cms\Banner::TYPE_VIDEO) selected @endif>Video
                    File
                </option>
                <option value="script" @if(old('type') == \App\Models\Cms\Banner::TYPE_SCRIPT) selected @endif>Script
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

        <div id="script" style="display: none">
            <div class="form-group">
                <label>{{__('og.banners.script')}}</label>
                <textarea class="form-control" name="script" rows="3">{{ old('script') }}</textarea>
            </div>
        </div>

        <br>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection

@section('js')
    <script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
    @include('back._common.js.summernote-with-lfm')
    <script>
        $(document).ready(function () {
                    {{-- TODO: make this cleaner --}}
            var domain = "{{ url(config('lfm.url_prefix')) }}";

            $('#lfm').filemanager('image', {prefix: domain});
            $('#thumbnail').on('change', function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#images').html('<img src="' + $(this).val() + '" style="margin:15px 10px 15px 10px;max-height:100px;">');

            });

            $('#lfm-video-btn').filemanager('video', {prefix: domain});
            $('#lfm-video-thumbnail').on('change', function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#lfm-video').html(`<video width="320" height="240" controls>
                <source src="` + $(this).val() + `" type="video/mp4">
                        Your browser does not support the video tag.
                </video>`);

            });

            $('#lfm-image-btn').filemanager('image', {prefix: domain});
            $('#lfm-image-thumbnail').on('change', function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#lfm-image').html('<img src="' + $(this).val() + '" style="margin:15px 10px 15px 10px;max-height:100px;">');

            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('select[id^="link_type_id"]').on('change', function () {
                var link_type_id = $(this).val();
                var local = $(this).data('locale');

                $.ajax({
                    method: "POST",
                    url: "{{ route('back.banners.get_form_by_link_type_id') }}",
                    data: {link_type_id: link_type_id, local: local},
                    //dataType: "json",
                    success: function (data) {
                        $('#link_type_' + local).html(data);
                    }
                });
            });

            $('select[name="type"]').on('change', function () {
                var type_file = $(this).val();

                $("#video_file").css('display', 'none');
                $("#image_file").css('display', 'none');
                $("#script").css('display', 'none');

                if (type_file == "{{ \App\Models\Cms\Banner::TYPE_IMAGE }}") {
                    $("#image_file").css('display', 'block');
                } else if (type_file == "{{ \App\Models\Cms\Banner::TYPE_VIDEO }}") {
                    $("#video_file").css('display', 'block');
                } else if (type_file == "{{ \App\Models\Cms\Banner::TYPE_SCRIPT }}") {
                    $("#script").css('display', 'block');
                }
            });
        });
    </script>
@stop
