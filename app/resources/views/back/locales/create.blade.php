@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.create'), false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.locales.store') }}" method="post" class="form-create">

        @csrf

        <div class="form-group">
            <label>{{__('og.locales.reference')}} *</label>
            <input type="text" class="form-control" name="reference" required>
        </div>

        <div class="form-group">
            <label>{{__('og.locales.name')}} *</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="form-group">
            <label>{{__('og.locales.is_default')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_default" value="1" class="icheck"> Yes </label>
                    <label>
                        <input type="radio" name="is_default" value="0" checked class="icheck"> No </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.locales.is_active')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1" class="icheck"> Yes </label>
                    <label>
                        <input type="radio" name="is_active" value="0" checked class="icheck"> No </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.locales.is_rtl')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_rtl" value="0" checked class="icheck"> LTR </label>
                    <label>
                        <input type="radio" name="is_rtl" value="1" class="icheck"> RTL </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection
