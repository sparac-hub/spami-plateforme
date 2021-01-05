@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.contact_recipients.create', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('og.box_title.create'), false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.contact_recipients.store') }}" method="post" class="form-create">

        @csrf
        <input type="hidden" name="menu_id" value="{{ request('menu_id') }}">

        <div class="form-group">
            <label>{{__('og.contact_recipients.email')}} *</label>
            <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection
