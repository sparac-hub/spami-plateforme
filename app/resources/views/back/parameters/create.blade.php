@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.create'), false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.parameters.store') }}" method="post" class="form-create">

        @csrf


        <div class="form-group">
            <label>{{__('og.parameters.name')}} *</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="form-group">
            <label>{{__('og.parameters.reference')}}</label>
            <input type="text" class="form-control" name="reference">
        </div>

        <div class="form-group">
            <label>{{__('og.parameters.value')}}</label>
            <input type="text" class="form-control" name="value">
        </div>

        <div class="form-group">
            <label>{{__('og.parameters.module_id')}} </label>
            <select class="form-control" name="module_id">
                {{ html_select('App\Models\Cms\Module', 'name') }}
            </select>
        </div>


        <div class="form-group">
            <label>{{__('og.parameters.parameter_group_id')}} </label>
            <select class="form-control" name="parameter_group_id">
                {{ html_select('App\Models\Cms\ParameterGroup', 'name') }}
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection
