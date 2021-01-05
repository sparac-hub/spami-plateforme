@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.faq_items.create', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.faq_items.create'), false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.faq_items.store') }}" method="post" class="form-create">

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
                            <label>{{__('og.faq_item_translations.question')}} *</label>
                            <textarea class="form-control summernote" name="{{ $locale }}[question]" rows="3">
                                {{ old($locale.'.question') }}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.faq_item_translations.answer')}} *</label>
                            <textarea class="form-control summernote" name="{{ $locale }}[answer]" rows="3">
                                {{ old($locale.'.answer') }}
                            </textarea>
                        </div>


                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        {{-- Begin common content --}}

        <input type="hidden" name="menu_id" value="{{ request('menu_id') }}">
        <div class="form-group">
            <label>{{__('og.faq_items.faq_category_id')}}</label>
            <select class="form-control" name="faq_category_id">
                <option value=""> ---</option>
                @if($faq_categories)
                    @foreach ($faq_categories as $faq_category)
                        <option value="{{ $faq_category->id }}"
                                @if(old('faq_category_id') == $faq_category->id) selected @endif
                        >{{ $faq_category->name }}</option>
                    @endforeach
                @endif
            </select>

        </div>

        <div class="form-group">
            <label>{{__('og.faq_items.order')}} </label>
            <input type="number" class="form-control" name="order" value="{{ old('order') }}">
        </div>

        <div class="form-group">
            <label>{{__('og.faq_items.is_active')}} </label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1" @if(old('is_active') == 1) checked @endif
                        class="icheck"> Activée </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(old('is_active') == 0) checked @endif
                               class="icheck"> Désactivée </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

        {{-- End  common content  --}}

    </form>


    {!! set_box_foot() !!}

@endsection

@section('js')
    @include('back._common.js.summernote-with-lfm')
@endsection
