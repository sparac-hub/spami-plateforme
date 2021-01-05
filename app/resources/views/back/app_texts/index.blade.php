@extends('back.layouts.app')

@section('css')
    @include('_common.css.datatables')
@stop

@section('content')

    {!! set_box_head(__('og.box_title.list').'App_texts', false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.app_texts.store') }}" method="post" class="form-create">

        @csrf

        <div class="tabbable-line">
            <ul class="nav nav-tabs">
                @foreach(config('translatable.locales') as $k => $locale)
                    <li class="@if($k==0) active @endif">
                        <a href="#tab_1_{{$locale}}"
                           data-toggle="tab">{{config('translatable.active_locales.'.$locale.'.name')}}
                            <span class="label label-sm @if($k==0) label-default @else label-danger @endif circle">{{ucfirst($locale)}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach(config('translatable.locales') as $k => $locale)
                    <div class="tab-pane @if($k==0) active @endif" id="tab_1_{{$locale}}">

                        {{-- Begin translatable content --}}

                        <h1>{{config('translatable.active_locales.'.$locale.'.name')}}</h1>

                        <div class="form-group">
                            <label>{{__('og.app_texts.text')}} </label>
                            <input type="text" class="form-control"
                                   name="text[{{$locale}}]"
                                   @if(isset($language_line_to_edit->text[$locale]))
                                   value="{{ $language_line_to_edit->text[$locale] }}"
                                    @endif
                            >
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.app_texts.group')}} *</label>
            <input type="text" class="form-control" name="group"
                   @if($language_line_to_edit)
                   value="{{ $language_line_to_edit->group }}"
                   @endif
                   required>
        </div>

        <div class="form-group">
            <label>{{__('og.app_texts.key')}} *</label>
            <input type="text" class="form-control" name="key"
                   @if($language_line_to_edit)
                   value="{{ $language_line_to_edit->key }}"
                   @endif
                   required>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    <hr>

    <div class="table-responsive">
        <table class="table table-bordered" id="data-table">
            <thead>
            <tr>
                <th>{{__('og.app_texts.id')}}</th>
                <th>{{__('og.app_texts.group')}}</th>
                <th>{{__('og.app_texts.key')}}</th>
                <th>{{__('og.app_texts.text')}}</th>
                <th>{{__('og.actions')}}</th>
            </tr>
            </thead>
        </table>
    </div>

    {!! set_box_foot() !!}

@endsection

@section('modals')
    <div class="modal fade bs-modal-sm" id="confirm-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="{{ route('back.app_texts.index') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Confirmationd de suppression</h4>
                    </div>
                    <div class="modal-body">

                        Voulez-vous vraiement supprimer cet enregistrement?

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline"
                                data-dismiss="modal">{{ __('og.button.cancel') }}</button>
                        <button type="submit" class="btn red">{{ __('og.button.delete') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('js')
    <script src="{{ asset('/back//assets/global/plugins/bootstrap-toastr/toastr.min.js') }}"
            type="text/javascript"></script>
    @include('_common.js.datatables')
    <script>
        $(function () {

            $("[data-toggle=tooltip]").tooltip();

            var table = $('#data-table').DataTable({
                pagingType: "full_numbers",
                processing: true,
                serverSide: true,
                ajax: '{!! route('back.app_texts.datatables') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'group', name: 'group'},
                    {data: 'key', name: 'key'},
                    {data: 'text', name: 'text'},
                    {data: 'actions', name: 'actions'},
                    {{--
                    { data: 'created_by, name: 'created_by' },
                    { data: 'updated_by', name: 'updated_by' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    --}}
                ],
                "drawCallback": function (settings) {
                    $("[data-toggle=tooltip]").tooltip();
                }
            });

        });

    </script>
@stop
