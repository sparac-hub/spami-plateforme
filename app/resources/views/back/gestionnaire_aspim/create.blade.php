@extends('back.layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('back.gestionnaire_aspim.create', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.gestionnaire_aspim.create'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.gestionnaire_aspim.store') }}" method="post" class="form-create"
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
                            <label>{{__('og.gestionnaire_aspim_translation.nom_abrege_institution')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[nom_abrege_institution]"
                                   value="{{ old($locale.'.nom_abrege_institution') }}" id="name_{{ $locale }}"
                            >
                        </div>

                        <div class="form-group">
                            <label>{{__('og.gestionnaire_aspim_translation.nom_institution')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[nom_institution]"
                                   value="{{ old($locale.'.nom_institution') }}" id="nom_institution_{{ $locale }}"
                            >
                        </div>


                        <div class="form-group">
                            <label>{{__('og.aspim_translations.slug')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[slug]"
                                   value="{{ old($locale.'.slug') }}" id="slug_{{ $locale }}"
                            >
                        </div>

                        <div class="form-group">
                            <label>{{__('og.aspim_translations.meta_title')}} </label>
                            <input type="text" class="form-control" value="{{ old($locale.'.meta_title') }}"
                                   name="{{$locale}}[meta_title]">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.aspim_translations.meta_description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[meta_description]"
                                      rows="3">{{ old($locale.'.meta_description') }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <input type="hidden" name="menu_id" value="{{ $menu_id }}">

        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.is_active')}} *</label>
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
            <label>{{__('og.gestionnaire_aspim.civilite')}}</label>
            <select class="form-control" name="civilite">
                <option value="Monsieur" @if(old('civilite') == "Monsieur") selected @endif>Monsieur</option>
                <option value="Madame" @if(old('civilite') == "Madame") selected @endif>Madame</option>
            </select>
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.name')}}</label>
            <input type="text" class="form-control" id="nom" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.surname')}} *</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname') }}">
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.email')}} *</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.password')}} *</label>
            <input type="password" class="form-control" id="password" name="password" value="">
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.confirm_password')}} *</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                   value="">
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.other_email')}}</label>
            <input type="text" class="form-control" id="other_email" name="other_email"
                   value="{{ old('other_email') }}">
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.tel')}} *</label>
            <input type="text" class="form-control" id="tel" name="tel" value="{{ old('tel') }}">
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.mobile')}}</label>
            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}">
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.fax')}}</label>
            <input type="text" class="form-control" id="fax" name="fax" value="{{ old('fax') }}">
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.aspim')}} *</label>
            <select class="form-control js-example-basic-multiple" name="aspim_id[]" multiple>
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
            <label>{{__('og.gestionnaire_aspim.langue')}}</label>
            <select class="form-control" name="langue">
                <option value="Français" @if(old('langue') == "Français") selected @endif>Français</option>
                <option value="Anglais" @if(old('langue') == "Anglais") selected @endif>Anglais</option>
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.other_langue')}}</label>
            <input type="text" class="form-control" id="other_langue" name="other_langue"
                   value="{{ old('other_langue') }}">
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.adresse')}}</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse') }}">
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.city')}}</label>
            <input type="text" class="form-control" id="cite" name="cite" value="{{ old('cite') }}">
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.code_zip')}}</label>
            <input type="text" class="form-control" id="code_zip" name="code_zip" value="{{ old('code_zip') }}">
        </div>

        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.pays')}}</label>
            <select class="form-control" name="countrie_id">
                <option value="">---</option>
                @if($countries)
                    @foreach ($countries as $countrie)
                        <option value="{{ $countrie->id }}"
                                @if(old('countrie_id') == $countrie->id) selected @endif
                        >{{ $countrie->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.position')}}</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}">
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.website')}}</label>
            <input type="text" class="form-control" id="website" name="website" value="{{ old('website') }}">
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.facebook')}}</label>
            <input type="text" class="form-control" id="facebook" name="facebook" value="{{ old('facebook') }}">
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.skype')}}</label>
            <input type="text" class="form-control" id="skype" name="skype" value="{{ old('skype') }}">
        </div>
        <div class="form-group">
            <label>{{__('og.gestionnaire_aspim.twitter')}}</label>
            <input type="text" class="form-control" id="twitter" name="twitter" value="{{ old('twitter') }}">
        </div>

        <div class="form-group">
            <label>{{__('og.aspim_translations.image')}} </label>
            <input type="file" class="form-control" name="image" accept="image/*"
                   value="{{ old('image') }}">
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection


@section('js')
    <script src="{{asset('back/assets/apps/scripts/todo-2.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/jquery.validate.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ asset("back/assets/global/plugins/jquery-validation/js/localization/messages_".locale().".js") }}"
            type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    @include('back._common.js.summernote-with-lfm')
    @include('_common.js.str_slug')

    @include('_common.js.create_slug', [
        'module' => 'gestionnaire_aspim',
    ])

    <script>
        $(function () {
            $("#creation_date").datepicker(
                {
                    format: 'yyyy'
                }
            );
        });
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
