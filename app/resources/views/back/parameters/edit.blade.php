@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.edit'), false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.parameters.update', $parameter->id) }}" method="post" class="form-create">

        @method('PUT')
        @csrf

        <div class="form-group">
            <label>{{__('og.parameters.name')}} *</label>
            <input type="text" class="form-control" name="name" value="{{ $parameter->name }}" disabled>
        </div>

        <div class="form-group">
            <label>{{__('og.parameters.reference')}} *</label>
            <input type="text" class="form-control" name="name" value="{{ $parameter->reference }}" disabled>
        </div>

        <div class="form-group">
            <label>{{__('og.parameters.value')}} </label>
            <input type="text" class="form-control" name="value" value="{{ $parameter->value }}">
        </div>

        <div class="form-group">
            <label>{{__('og.parameters.module_id')}} </label>
            <select class="form-control" name="module_id">
                {{ html_select('App\Models\Cms\Module', 'name', $parameter->module_id) }}
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.parameters.parameter_group_id')}} </label>
            <select class="form-control" name="parameter_group_id">
                {{ html_select('App\Models\Cms\ParameterGroup', 'name', $parameter->parameter_group_id) }}
            </select>
        </div>


        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection
