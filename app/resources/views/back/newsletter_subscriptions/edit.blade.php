@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.edit'), false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.newsletter_subscriptions.update', $newsletter_subscription->id) }}" method="post"
          class="form-create">

        @method('PUT')
        @csrf


        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection
