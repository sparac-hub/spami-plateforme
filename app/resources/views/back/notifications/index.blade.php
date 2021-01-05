@extends('back.layouts.app')

@section('content')

    {!! set_box_head('Notifications', false) !!}

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('misc.contact.name')}}</th>
                <th>{{__('misc.contact.phone')}}</th>
                <th>{{__('misc.contact.created_at')}}</th>
                <th>{{__('misc.contact.read_at')}}</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach(Auth::user()->notifications()->paginate(5) as $notification)
                <tr>
                    <td>{{$notification->data['name']}}</td>
                    <td>{{$notification->data['phone']}}</td>
                    <td>{{$notification->created_at}}</td>
                    <td>{{$notification->read_at}}</td>
                    <td><a href="{{route('back.notifications.show', $notification->id)}}">Lire</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    {{Auth::user()->notifications()->paginate(5)->links()}}


    {!! set_box_foot() !!}

@endsection
