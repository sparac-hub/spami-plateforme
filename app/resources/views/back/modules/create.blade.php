@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.create') . ' module', false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.modules.store') }}" method="post" class="form-create">

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
                            <label>{{__('og.modules.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]"
                                   value="{{ old($locale.'.name') }}" required>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.modules.reference')}} *</label>
            <input type="text" class="form-control" name="reference"
                   value="{{ old('reference') }}" required>
        </div>

        <div class="form-group">
            <label>{{__('og.modules.is_active')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if(old('is_active') == 1){{ 'checked' }}@endif class="icheck"> Activé </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(old('is_active') == 0){{ 'checked' }}@endif class="icheck"> Désactivé </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.modules.is_menu_module')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_menu_module" value="1"
                               @if(old('is_menu_module')){{ 'checked' }}@endif class="icheck"> Yes </label>
                    <label>
                        <input type="radio" name="is_menu_module" value="0"
                               @if(!old('is_menu_module')){{ 'checked' }}@endif class="icheck"> No </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.modules.order')}} *</label>
            <input type="number" class="form-control" name="order" value="{{ old('order') }}" required>
        </div>

        <div class="form-group">
            <label>{{__('og.modules.icon')}} {{old('icon')}}</label>
            <select class="form-control" name="icon" style="font-family: FontAwesome, sans-serif;">
                <option value=""></option>
                @foreach(config('fa.icons') as $icon_name => $icon_symbol)
                    <option value="fa {{$icon_name}}"
                            @if('fa '.$icon_name == old('icon')) selected @endif >{{$icon_symbol}}  {{$icon_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.modules.backend_route')}} *</label>
            <input type="text" class="form-control" name="backend_route" value="{{ old('backend_route') }}">
        </div>

        <div class="form-group">
            <label>{{__('og.modules.frontend_route')}}</label>
            <input type="text" class="form-control" name="frontend_route" value="{{ old('front_route') }}">
        </div>

        <div class="form-group">
            <label>{{__('og.modules.is_on_backend_sidebar')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_on_backend_sidebar" value="1"
                               @if(old('is_on_backend_sidebar')){{ 'checked' }}@endif class="icheck"> Yes </label>
                    <label>
                        <input type="radio" name="is_on_backend_sidebar" value="0"
                               @if(!old('is_on_backend_sidebar')){{ 'checked' }}@endif class="icheck"> No </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection
