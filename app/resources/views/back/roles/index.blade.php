@extends('back.layouts.app')

@section('content')

    {!! set_box_head('Roles', false) !!}

    @include('back._common.alerts.messages')

    <a href="#small" data-toggle="modal" class="btn btn-primary">
        {{ __('og.button.create') }}
    </a>

    <hr>

    <table class="table table- table-bordered">
        <thead>
        <tr>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        </thead>
        @foreach($roles as $role)
            <tr>
                <td>
                    {{ $role->name }}
                </td>
                <td>
                    <a href="{{ route('back.roles.edit', $role->id) }}" class="btn btn-success">
                        <span class="fa fa-edit"></span>
                        {{ __('og.button.edit_permissions') }}
                    </a>
                    <a {{--href="{{ route('back.roles.update', $role->id) }}"--}} href="#small_update_{{$role->id}}"
                       data-toggle="modal" class="btn btn-primary">
                        <span class="glyphicon glyphicon-pencil" data-placement="top" data-toggle="tooltip" title=""
                              data-original-title="Edit"></span>
                    </a>
                </td>
            </tr>

            <div class="modal fade bs-modal-sm" id="small_update_{{$role->id}}" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <form action="{{ route('back.roles.update', $role->id) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Editer un role</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>Role *</label>
                                    <input type="text" value="{{ old('name',$role->name ) }}" class="form-control"
                                           name="name" required>
                                </div>

                                <div class="form-group">
                                    <label>Has access BO</label>
                                    <select class="form-control" name="has_access_bo">
                                        <option
                                            value="0" {{ old('has_access_bo',$role->has_access_bo ) == 0?'selected':'' }}>
                                            false
                                        </option>
                                        <option
                                            value="1" {{ old('has_access_bo',$role->has_access_bo ) == 1?'selected':'' }}>
                                            true
                                        </option>
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
        @endforeach
    </table>


    {{-- pp($roles->load('permissions.module')->toArray()) --}}


    {!! set_box_foot() !!}

@stop

@section('modals')
    <div class="modal fade bs-modal-sm" id="small" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="{{ route('back.roles.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Créer un role</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Role *</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label>Has access BO</label>
                            <select class="form-control" name="has_access_bo">
                                <option value="0">false</option>
                                <option value="1">true</option>
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
