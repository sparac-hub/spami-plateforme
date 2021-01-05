@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.box_title.details').'Contact' , false) !!}

    @include('back._common.alerts.messages')

    <table class="table table-bordered">
        {{--
        <tr>
            <th>{{__('og.contact_messages.menu_id')}}</th>
            <td>{{ $contact_message->menu_id }}</td>
        </tr>
        --}}
        <tr>
            <th>{{__('og.contact_messages.name')}}</th>
            <td>{{ $contact_message->name }}</td>
        </tr>
        <tr>
            <th>{{__('og.contact_messages.first_name')}}</th>
            <td>{{ $contact_message->first_name }}</td>
        </tr>
        <tr>
            <th>{{__('og.contact_messages.last_name')}}</th>
            <td>{{ $contact_message->last_name }}</td>
        </tr>
        <tr>
            <th>{{__('og.contact_messages.phone')}}</th>
            <td>{{ $contact_message->phone }}</td>
        </tr>
        <tr>
            <th>{{__('og.contact_messages.fax')}}</th>
            <td>{{ $contact_message->fax }}</td>
        </tr>
        <tr>
            <th>{{__('og.contact_messages.address')}}</th>
            <td>{{ $contact_message->address }}</td>
        </tr>
        <tr>
            <th>{{__('og.contact_messages.governorate_id')}}</th>
            <td>{{ $contact_message->governorate_id }}</td>
        </tr>
        <tr>
            <th>{{__('og.contact_messages.email')}}</th>
            <td>{{ $contact_message->email }}</td>
        </tr>
        <tr>
            <th>{{__('og.contact_messages.read_at')}}</th>
            <td>{{ $contact_message->read_at }}</td>
        </tr>
        <tr>
            <th>{{__('og.contact_messages.subject')}}</th>
            <td>{{ $contact_message->object }}</td>
    </table>

    <strong>{{__('og.contact_messages.message')}}</strong>
    <hr>
    {{ $contact_message->message }}

    {!! set_box_foot() !!}

@endsection
