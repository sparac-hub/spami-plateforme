@extends('back.layouts.app')

@section('content')

    {!! set_box_head('Users', false) !!}

    @include('back._common.alerts.messages')

    <a href="#small" data-toggle="modal" class="btn btn-primary">
        {{ __('og.button.create') }}
    </a>

    <hr>
    <h1>Administrators</h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>{{ __('og.users.name') }}</th>
            <th>{{ __('og.users.email') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
            </tr>
        @endforeach
        </tbody>

    </table>

    <h1>Users</h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>{{ __('og.users.name') }}</th>
            <th>{{ __('og.users.email') }}</th>
            <th>{{ __('og.users.role') }}</th>
            <th>{{ __('og.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            @if(!in_array('Admin',$user->getRoleNames()->toArray()))
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(isset($user->roles->first()->name))
                            {!! link_route('back.roles.edit', $user->roles->first()->name, $user->roles->first()->id) !!}
                        @endif
                    </td>
                    <td>
                        @can('back.users.edit')
                            <a href="{{ route('back.users.edit', $user->id) }}" class="btn btn-xs btn-primary"
                               class="edit"><i
                                        class="fa fa-edit"></i></a>
                        @endcan
                        @can('back.users.destroy')
                            <form style="display:inline" action="{{route('back.users.destroy', $user->id)}}"
                                  method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="_method" value="DELETE">
                                <span data-placement="top" data-toggle="tooltip" title="Supprimer">
                            <button class="btn btn-xs btn-danger" type="submit"
                                    {{  $user->hasRole('Admin')?'disabled':'' }}
                                    onclick="return confirm('{{__('og.alert.confirm_deletion')}}')">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </span>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>

    {!! set_box_foot() !!}

@stop


@section('modals')
    <div class="modal fade bs-modal-md" id="small" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{ route('back.users.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Créer un role</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>{{ __('og.users.name') }} *</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label>{{ __('og.users.email') }} *</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="form-group">
                            <label>{{ __('og.users.password') }} *</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.users.role')}} *</label>
                            <select class="form-control" name="role_id" required>
                                {{ html_select('App\Models\Cms\Role', 'name') }}
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline"
                                data-dismiss="modal">{{ __('og.button.cancel') }}</button>
                        <button type="submit" class="btn green">{{ __('og.button.create') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@stop
