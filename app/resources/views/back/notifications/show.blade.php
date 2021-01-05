@extends('back.layouts.app')

@section('content')

    {!! set_box_head('Notification', false) !!}

    <table class="table table-bordered">
        <tr>
            <th>{{__('misc.contact.name')}}</th>
            <td>{{ $notification->data['name'] }}</td>
        </tr>
        <tr>
            <th>{{__('misc.contact.phone')}}</th>
            <td>{{ $notification->data['phone'] }}</td>
        </tr>
        <tr>
            <th>{{__('misc.contact.email')}}</th>
            <td>{{ $notification->data['email'] }}</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>{{$notification->created_at}}</td>
        </tr>
    </table>

    <h3>{{__('misc.contact.message')}}</h3>

    <p>
        {{$notification->data['message']}}
    </p>

    {!! set_box_foot() !!}

@endsection
