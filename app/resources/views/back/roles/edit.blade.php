@extends('back.layouts.app')

@section('css')
    {{-- TODO: check duplicate witch on template --}}
    <link href="{{ asset('back/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/back/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet"
          type="text/css"/>
@stop

@section('content')

    {!! set_box_head('Permissions for role : '.$role->name, false) !!}

    @include('back._common.alerts.messages')

    <table class="table table-bordered">
        @foreach($data as $item)
            @if($item == "show")
                <h2>Pretty routes</h2>
            @else
                <h2>{{ $item }}</h2>
            @endif

            <table class="table table-bordered">
                @foreach($permissions as $key => $permission)

                    @php
                        $match = explode('.',$permission->name);
                        $actions = ['index', 'create', 'store','show' , 'edit', 'update', 'destroy'];
                        $array = [
                            'index' => '',
                            'create' => 'store',
                            'show' => '',
                            'edit' => 'update',
                            'destroy' => ''
                        ];

                    @endphp

                    @if($item == $match[1])
                        @if(isset($match[2]) && $match[0] == 'back' && in_array($match[2], $actions))
                            @if(array_key_exists($match[2], $array))
                                @php
                                    $permission_id = '';
                                        if($array[$match[2]]){
                                            $permission_route_name = $match[0].'.'.$match[1].'.'.$array[$match[2]];

                                            $permission_id = \App\Models\Cms\Permission::whereName($permission_route_name)->first()->id;
                                        }
                                @endphp
                                <tr>
                                    <td width="10%">
                                        <input type="checkbox"
                                               data-permission_id="{{$permission->id}}"
                                               data-permission_with="{{$permission_id}}"
                                               class="make-switch"
                                               @if($role->permissions->pluck('id')->contains($permission->id)){{'checked'}}@endif
                                               data-on-text="<i class='fa fa-check'></i>"
                                               data-off-text="<i class='fa fa-times'></i>">
                                    </td>
                                    <td>
                                        {{ __($permission->name) }}
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr>
                                <td width="10%">
                                    <input type="checkbox"
                                           data-permission_id="{{$permission->id}}"
                                           class="make-switch"
                                           @if($role->permissions->pluck('id')->contains($permission->id)){{'checked'}}@endif
                                           data-on-text="<i class='fa fa-check'></i>"
                                           data-off-text="<i class='fa fa-times'></i>">
                                </td>
                                <td>
                                    {{ __($permission->name) }}
                                </td>
                            </tr>
                        @endif
                    @endif
                @endforeach
            </table>
        @endforeach
    </table>

    {{--@foreach($permissions->groupBy('module_id') as $module_permissions)

        @if(isset($module_permissions->first()->module->name))

            <h2>{{ $module_permissions->first()->module->name }}</h2>

            <table class="table table-bordered">
                @foreach($module_permissions as $permission)
                    <tr>
                        <td width="10%">
                            <input type="checkbox"
                                   data-permission_id="{{$permission->id}}"
                                   class="make-switch"
                                   @if($role->permissions->pluck('id')->contains($permission->id)){{'checked'}}@endif
                                   data-on-text="<i class='fa fa-check'></i>"
                                   data-off-text="<i class='fa fa-times'></i>">
                        </td>
                        <td>
                            {{ __('permissions.'.$permission->name) }}
                        </td>
                    </tr>
                @endforeach
            </table>
            --}}{{-- pp($module_permissions->toArray()) --}}{{--

        @endif

    @endforeach--}}


    {{--
        This code is to generate translatable
        @foreach($permissions->groupBy('module_id') as $module_permissions)
            // {{ $module_permissions->first()->module->name }} <br>
            @foreach($module_permissions as $permission)

                <? !!!!!!!! php
                $w = $permission->name;
                $w = str_replace('_', ' ', $w);
                ?>
                  '{{ $permission->name }}' => '{{ ucwords($w) }}', <br>

            @endforeach
        @endforeach
    --}}


    {!! set_box_foot() !!}

@endsection

@section('js')
    <script src="{{ asset('back/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('back/assets/pages/scripts/components-bootstrap-switch.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('/back//assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"
            type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $(".make-switch").bootstrapSwitch({
                onSwitchChange: function (e, state) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "POST",
                        url: '{{ route('back.roles.change-permission-status') }}',
                        data: {
                            state: state,
                            role_id: '{{$role->id}}',
                            permission_id: $(this).data('permission_id'),
                            permission_with: $(this).data('permission_with')
                        }
                    })
                        .done(function (data) {
                            {{-- TODO: Show toastr in case of error --}}
                            if (data.result == 'success')
                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "positionClass": "toast-top-right",
                                    "onclick": null,
                                    "showDuration": "1000",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                            toastr.success("{{ __('og.alert.success') }}", "{{ __('og.alert_title.congratulations') }}");
                        });

                }
            });
        })
    </script>
@endsection
