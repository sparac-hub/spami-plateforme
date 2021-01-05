@extends('back.layouts.app')

@section('content')

    {!! set_box_head('Users', false) !!}

    @include('back._common.alerts.messages')

    <form action="{{ route('back.users.update', $user->id) }}" method="POST">
        @csrf

        @method('PUT')


        <div class="form-group">
            <label>{{ __('og.users.name') }} *</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label>{{ __('og.users.email') }} *</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label>{{ __('og.users.password') }}</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
            <label>{{__('og.users.role')}} *</label>
            <select class="form-control" name="role_id" required>
                {{ html_select('App\Models\Cms\Role', 'name', $user->roles->first()->id ?? null) }}
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@stop
