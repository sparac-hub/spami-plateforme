@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.useful_link_categories.create', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('og.box_title.create'), false)  !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.useful_link_categories.store') }}" method="post" class="form-create">

        @csrf
        <input type="hidden" class="form-control" name="menu_id" value="{{ $menu_id }}">

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
                            <input type="text" class="form-control" name="{{$locale}}[title]"
                                   id="title_{{ $locale }}" value="{{ old($locale . '.title') }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.useful_link_category_translations.slug')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[slug]"
                                   id="slug_{{ $locale }}" value="{{ old($locale . '.slug') }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.useful_link_category_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]"
                                      rows="3">{{ old($locale . '.description') }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.useful_link_categories.order')}} </label>
            <input type="number" class="form-control" name="order"
                   value="{{ old('order') }}" value="0">
        </div>

        <div class="form-group">
            <label>{{__('og.useful_link_categories.is_active')}} *</label>
            <div class="input-group">
                <label>
                    <input type="radio" name="is_active" value="1"
                           @if(old('is_active') == 1) checked @endif class="icheck"> Activé
                </label>
                <label>
                    <input type="radio" name="is_active" value="0"
                           @if(old('is_active') == 0) checked @endif class="icheck"> Désactivé
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

    </form>

    {!! set_box_foot()  !!}

@endsection

@section('js')
    @include('_common.js.str_slug')
    <script>
        $(document).ready(function () {
            @foreach(config('translatable.locales') as $locale)
            $('#title_{{ $locale }}').on("keyup", function () {
                $('#slug_{{ $locale }}').val(str_slug($(this).val()));
            });
            @endforeach
        });
    </script>
@endsection
