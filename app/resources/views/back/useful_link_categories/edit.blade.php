@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.useful_link_categories.edit', $useful_link_category->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('og.box_title.edit'), false)  !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.useful_link_categories.update', $useful_link_category->id) }}" method="post"
          class="form-create">

        <input type="hidden" class="form-control" name="menu_id" value="{{$useful_link_category->menu_id}}">
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
                            <label>{{__('og.useful_link_category_translations.title')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[title]" id="name_{{ $locale }}"
                                   value="{{ old($locale . '.title', $useful_link_category->translateOrNew($locale)->title) }}"
                            >
                        </div>

                        <div class="form-group">
                            <label>{{__('og.useful_link_category_translations.slug')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[slug]" id="slug_{{ $locale }}"
                                   value="{{ old($locale . '.slug', $useful_link_category->translateOrNew($locale)->slug) }}"
                            >
                        </div>

                        <div class="form-group">
                            <label>{{__('og.useful_link_category_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]"
                                      rows="3">{{ old($locale . '.description', $useful_link_category->translateOrNew($locale)->description) }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.useful_link_categories.order')}} </label>
            <input type="number" class="form-control" name="order"
                   value="{{ old('order', $useful_link_category->order) }}">
        </div>

        <div class="form-group">
            <label>{{__('og.useful_link_categories.is_active')}} </label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if(old('is_active', $useful_link_category->is_active)){{'checked'}}@endif
                               class="icheck"> Activée
                    </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(! old('is_active', $useful_link_category->is_active)){{'checked'}}@endif
                               class="icheck"> Désactivée
                    </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot()  !!}

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
        'module' => 'useful_link_categories',
        'menu' => $useful_link_category
    ])
@endsection
