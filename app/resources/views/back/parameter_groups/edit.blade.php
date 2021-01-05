@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.edit'), false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.parameter_groups.update', $parameter_group->id) }}" method="post" class="form-create">

        @method('PUT')
        @csrf

        <div class="form-group">
            <label>{{__('og.parameter_groups.name')}} *</label>
            <input type="text" class="form-control" name="name" value="{{$parameter_group->name}}" required>
        </div>


        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection
