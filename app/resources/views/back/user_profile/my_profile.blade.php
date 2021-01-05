@extends('back.layouts.app')

@section('content')

    {!! set_box_head(__('og.my_profile.my_profile'), false) !!}

    @include('back._common.alerts.messages')

    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3">
            <ul class="nav nav-tabs tabs-left">
                <li @if(!old('old_password')) class="active" @endif>
                    <a href="#tab_general" data-toggle="tab">
                        {{ __('og.my_profile.general') }}
                    </a>
                </li>
                <li @if(old('old_password')) class="active" @endif>
                    <a href="#tab_password" data-toggle="tab">
                        {{ __('og.my_profile.password') }}
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <div class="tab-content">
                <div class="tab-pane @if(!old('old_password')) active @endif" id="tab_general">

                    <form action="{{ route('back.user_profile.update') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>{{ __('og.users.name') }} *</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                        </div>

                        <div class="form-group">
                            <label>{{ __('og.users.email') }} *</label>
                            <input type="email" class="form-control" name="email"
                                   value="{{ old('email', $user->email) }}">
                        </div>

                        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

                    </form>

                </div>
                <div class="tab-pane @if(old('old_password')) active @endif" id="tab_password">

                    <form action="{{ route('back.user_profile.update') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>{{ __('og.users.old_password') }} *</label>
                            <input type="password" class="form-control" name="old_password" required>
                        </div>

                        <div class="form-group">
                            <label>{{ __('og.users.password') }} *</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label>{{ __('og.users.confirm_password') }} *</label>
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

                    </form>

                </div>
            </div>
        </div>
    </div>










    {!! set_box_foot() !!}

@stop

