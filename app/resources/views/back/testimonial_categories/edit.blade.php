@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.testimonial_categories.edit', $testimonial_category->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.testimonial_categories.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.testimonial_categories.update', $testimonial_category->id) }}" method="post"
          class="form-create">

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

                        <div class="form-group">
                            <label>{{__('og.testimonial_category_translations.title')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[title]" id="title_{{ $locale }}"
                                   value="{{$testimonial_category->translateOrNew($locale)->title}}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.testimonial_category_translations.slug')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[slug]" id="slug_{{ $locale }}"
                                   value="{{$testimonial_category->translateOrNew($locale)->slug}}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.testimonial_category_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]"
                                      rows="3">{{$testimonial_category->translateOrNew($locale)->description}}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.testimonial_categories.menu_id')}} </label>
            <input type="text" class="form-control" name="menu_id" value="{{$testimonial_category->menu_id}}">
        </div>

        <div class="form-group">
            <label>{{__('og.testimonial_categories.order')}} </label>
            <input type="number" class="form-control" name="order" value="{{$testimonial_category->order}}">
        </div>

        <div class="form-group">
            <label>{{__('og.testimonial_categories.is_active')}} </label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if($testimonial_category->is_active){{'checked'}}@endif class="icheck"> Activé </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(!$testimonial_category->is_active){{'checked'}}@endif class="icheck"> Désactivé
                    </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot()  !!}

@endsection

@section('js')
    @include('_common.js.str_slug')
    @include('_common.js.edit_slug', [
        'module' => 'testimonial_categories',
        'menu' => $testimonial_category
    ])
@endsection
