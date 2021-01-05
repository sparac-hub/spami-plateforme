@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.create'), false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.parameter_groups.store') }}" method="post" class="form-create">

        @csrf

        <div class="form-group">
            <label>{{__('og.parameter_groups.name')}} *</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection
