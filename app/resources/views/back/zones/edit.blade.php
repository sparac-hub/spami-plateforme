@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.zones.update', $zone->id) }}" method="post" class="form-create">

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
                            <label>{{__('og.zone_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]"
                                   value="{{$zone->translateOrNew($locale)->name ?? null}}"
                                   required>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.zones.city_id')}} *</label>
            <input type="text" class="form-control" name="city_id" value="{{$zone->city_id}}" required>
        </div>

        <div class="form-group">
            <label>{{__('og.zones.governorate_id')}} *</label>
            <input type="text" class="form-control" name="governorate_id" value="{{$zone->governorate_id}}" required>
        </div>

        <div class="form-group">
            <label>{{__('og.zones.country_id')}} *</label>
            <input type="text" class="form-control" name="country_id" value="{{$zone->country_id}}" required>
        </div>

        <div class="form-group">
            <label>{{__('og.zones.is_active')}} *</label>
            <input type="text" class="form-control" name="is_active" value="{{$zone->is_active}}" required>
        </div>

        <div class="form-group">
            <label>{{__('og.zones.order')}} *</label>
            <input type="number" class="form-control" name="order" value="{{$zone->order}}" required>
        </div>


        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection
