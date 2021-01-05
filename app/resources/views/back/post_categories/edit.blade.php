@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.edit'), false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.post_categories.update', $post_category->id) }}" method="post"
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

                        <div class="form-group">
                            <label>{{__('og.post_category_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]"
                                   value="{{ $post_category->translateOrNew($locale)->name }}" required>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.post_category_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]"
                                      rows="3">{{ $post_category->translateOrNew($locale)->description }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        {{-- Begin common content --}}

        <hr>

        <div class="form-group">
            <label>{{__('og.post_categories.menu_id')}} </label>
            <select class="form-control" name="menu_id">

            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.post_categories.order')}} *</label>
            <input type="number" class="form-control" name="order" value="{{ $post_category->order }}" required>
        </div>

        <div class="form-group">
            <label>{{__('og.menus.is_active')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if($post_category->is_active){{ 'checked' }}@endif class="icheck"> Activée </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(!$post_category->is_active){{ 'checked' }}@endif class="icheck"> Désactivée </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection
