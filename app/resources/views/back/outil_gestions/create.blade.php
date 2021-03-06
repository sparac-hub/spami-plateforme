@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.outil_gestions.create', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.outil_gestions.create'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.outil_gestions.store') }}" method="post" class="form-create"
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
                            <label>{{__('og.outil_gestion_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]"
                                   value="{{ old($locale.'.name') }}" id="name_{{ $locale }}"
                            >
                        </div>

                        <div class="form-group">
                            <label>{{__('og.outil_gestion_translations.slug')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[slug]"
                                   value="{{ old($locale.'.slug') }}" id="slug_{{ $locale }}"
                            >
                        </div>

                        <div class="form-group">
                            <label>{{__('og.outil_gestion_translations.meta_title')}} </label>
                            <input type="text" class="form-control" value="{{ old($locale.'.meta_title') }}"
                                   name="{{$locale}}[meta_title]">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.outil_gestion_translations.meta_description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[meta_description]"
                                      rows="3">{{ old($locale.'.meta_description') }}</textarea>
                        </div>


                        <div class="form-group">
                            <label>{{__('og.outil_gestions.type')}} *</label>
                            <select class="form-control" id="type_{{$locale}}" name="{{$locale}}[type]"
                                    data-locale="{{$locale}}">
                                <option value="0" selected>---</option>
                                <option value="{{ \App\Models\Cms\OutilGestion::GUIDELINE }}"
                                        @if(old($locale.'.type') == \App\Models\Cms\OutilGestion::GUIDELINE) selected @endif>
                                    GUIDELINE
                                </option>
                                <option value="{{ \App\Models\Cms\OutilGestion::VIDEO }}"
                                        @if(old($locale.'.type') == \App\Models\Cms\OutilGestion::VIDEO) selected @endif>
                                    VIDEO
                                </option>
                                <option value="{{ \App\Models\Cms\OutilGestion::LIEN }}"
                                        @if(old($locale.'.type') == \App\Models\Cms\OutilGestion::LIEN) selected @endif>
                                    LIEN
                                </option>
                                <option value="{{ \App\Models\Cms\OutilGestion::MANUEL }}"
                                        @if(old($locale.'.type') == \App\Models\Cms\OutilGestion::MANUEL) selected @endif>
                                    MANUEL
                                </option>
                            </select>
                        </div>

                        <div class="form-group" id="guideline_{{$locale}}" style="display: none">
                            <label>{{__('og.outil_gestions.document')}} </label>
                            <input type="file" class="form-control" name="{{$locale}}[file_guideline]"
                                   accept="application/pdf">
                        </div>

                        <div class="form-group" id="video_{{$locale}}" style="display: none">
                            <label>{{__('og.outil_gestions.url_video')}} </label>
                            <input type="url" class="form-control" id="url_video_{{$locale}}"
                                   name="{{$locale}}[url_video]" value="{{ old($locale.'.url_video') }}">
                        </div>

                        <div class="form-group" id="lien_{{$locale}}" style="display: none">
                            <label>{{__('og.outil_gestions.url_lien')}} </label>
                            <input type="url" class="form-control" id="url_lien_{{$locale}}"
                                   name="{{$locale}}[url_lien]" value="{{ old($locale.'.url_lien') }}">
                        </div>

                        <div class="form-group" id="manuel_{{$locale}}" style="display:none">
                            <label>{{__('og.outil_gestions.document')}} </label>
                            <input type="file" class="form-control" name="{{$locale}}[file_manuel]"
                                   accept="application/pdf">
                        </div>
                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <input type="hidden" name="menu_id" value="{{ request('menu_id') }}">
        <div class="form-group">
            <label>{{__('og.outil_gestions.outil_gestion_category_id')}}</label>
            <select class="form-control" name="outil_gestion_category_id">
                <option value="">---</option>
                @if($outil_gestion_categories)
                    @foreach ($outil_gestion_categories as $outil_gestion_category)
                        <option value="{{ $outil_gestion_category->id }}"
                                @if(old('outil_gestion_category_id') == $outil_gestion_category->id) selected @endif
                        >{{ $outil_gestion_category->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.outil_gestions.aspim')}} </label>
            <select class="form-control" name="aspim_id">
                <option value="">---</option>
                @if($aspims)
                    @foreach ($aspims as $aspim)
                        <option value="{{ $aspim->id }}"
                                @if(old('aspim_id') == $aspim->id) selected @endif
                        >{{ $aspim->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.outil_gestions.is_active')}} *</label>
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
    @include('back.media_files.partials.lfm_file_picker')
    <script src="{{asset('back/assets/apps/scripts/todo-2.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/jquery.validate.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/localization/messages_".locale().".js") }}"
            type="text/javascript"></script>
    @include('back._common.js.summernote-with-lfm')
    @include('_common.js.str_slug')

    @include('_common.js.create_slug', [
        'module' => 'outil_gestions',
    ])
    <script>
        $(document).ready(function () {
            $('select[id^="type"]').on('change', function () {
                const locale = $(this).data('locale');

                var type_file = $(this).val();
                if (type_file == "{{ \App\Models\Cms\OutilGestion::VIDEO }}") {
                    $("#video_" + locale).css('display', 'block');
                    $("#guideline_" + locale).css('display', 'none');
                    $("#manuel_" + locale).css('display', 'none');
                    $("#lien_" + locale).css('display', 'none');
                } else if (type_file == "{{ \App\Models\Cms\OutilGestion::GUIDELINE }}") {
                    $("#video_" + locale).css('display', 'none');
                    $("#guideline_" + locale).css('display', 'block');
                    $("#manuel_" + locale).css('display', 'none');
                    $("#lien_" + locale).css('display', 'none');
                } else if (type_file == "{{ \App\Models\Cms\OutilGestion::MANUEL }}") {
                    $("#video_" + locale).css('display', 'none');
                    $("#guideline_" + locale).css('display', 'none');
                    $("#manuel_" + locale).css('display', 'block');
                    $("#lien_" + locale).css('display', 'none');
                } else if (type_file == "{{ \App\Models\Cms\OutilGestion::LIEN }}") {
                    $("#video_" + locale).css('display', 'none');
                    $("#guideline_" + locale).css('display', 'none');
                    $("#manuel_" + locale).css('display', 'none');
                    $("#lien_" + locale).css('display', 'block');
                } else {

                }
            });
        });
    </script>
@endsection
