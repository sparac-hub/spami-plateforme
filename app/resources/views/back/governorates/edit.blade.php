@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.governorates.update', $governorate->id) }}" method="post" class="form-create">

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
                            <label>{{__('og.governorate_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]"
                                   value="{{$governorate->translateOrNew($locale)->name ?? null}}" required>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.governorates.country_id')}} *</label>
            <select class="form-control" name="country_id" required>
                @if(isset($country_id_options))
                    @foreach($country_id_options as $country_id)
                        <option value="{{$country_id->id}}">{{$country_id->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.governorates.is_active')}} *</label>
            <input type="text" class="form-control" name="is_active" value="{{$governorate->is_active}}" required>
        </div>

        <div class="form-group">
            <label>{{__('og.governorates.order')}} </label>
            <input type="number" class="form-control" name="order" value="{{$governorate->order}}">
        </div>


        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection
