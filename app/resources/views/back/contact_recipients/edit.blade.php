@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.contact_recipients.edit', $contact_recipient->menu_id) }}
@endsection


@section('content')

    {!! set_box_head(__('og.box_title.edit'), false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.contact_recipients.update', $contact_recipient->id) }}" method="post"
          class="form-create">

        @method('PUT')
        @csrf

        <div class="form-group">
            <label>{{__('og.contact_recipients.email')}} *</label>
            <input type="text" class="form-control" name="email" value="{{ old('email', $contact_recipient->email) }}"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection
