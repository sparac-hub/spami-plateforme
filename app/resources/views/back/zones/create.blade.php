@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.create'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.zones.store') }}" method="post" class="form-create">

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
                            <label>{{__('og.zone_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]" required>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.zones.country_id')}} *</label>
            <select class="form-control" name="country_id" required>
                <option value=""></option>
                @foreach($country_translations as $country_translation)
                    <option value="{{$country_translation->country_id}}">{{$country_translation->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.zones.governorate_id')}} *</label>
            <select class="form-control" name="governorate_id" required>
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.zones.city_id')}} *</label>
            <select class="form-control" name="city_id" required>
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.zones.is_active')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1" class="icheck"> Activé </label>
                    <label>
                        <input type="radio" name="is_active" value="0" checked class="icheck"> Désactivé </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>{{__('og.zones.order')}} *</label>
            <input type="number" class="form-control" name="order" value="0" required>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection

@section('js')
    @include('back._common.js.location.get_by_country')
    @include('back._common.js.location.get_by_governorate')
@endsection
