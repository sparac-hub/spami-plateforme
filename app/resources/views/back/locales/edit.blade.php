@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.edit'), false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.locales.update', $locale->id) }}" method="post" class="form-create">

        @method('PUT')
        @csrf

        <div class="form-group">
            <label>{{__('og.locales.reference')}} *</label>
            <input type="text" class="form-control" name="reference" value="{{ $locale->reference }}" required>
        </div>

        <div class="form-group">
            <label>{{__('og.locales.name')}} *</label>
            <input type="text" class="form-control" name="name" value="{{ $locale->name }}" required>
        </div>

        <div class="form-group">
            <label>{{__('og.locales.is_default')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_default" value="1"
                               @if($locale->is_default){{'checked'}}@endif class="icheck"> Yes </label>
                    <label>
                        <input type="radio" name="is_default" value="0"
                               @if(!$locale->is_default){{'checked'}}@endif class="icheck"> No </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.locales.is_active')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if($locale->is_active){{'checked'}}@endif class="icheck"> Yes </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(!$locale->is_active){{'checked'}}@endif class="icheck"> No </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.locales.is_rtl')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_rtl" value="0"
                               @if(!$locale->is_rtl){{'checked'}}@endif class="icheck"> LTR </label>
                    <label>
                        <input type="radio" name="is_rtl" value="1"
                               @if($locale->is_rtl){{'checked'}}@endif class="icheck"> RTL </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection
