@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.create'), false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.languages.store') }}" method="post" class="form-create">

        @csrf

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection
