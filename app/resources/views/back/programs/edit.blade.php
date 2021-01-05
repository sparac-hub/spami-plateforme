@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.programs.edit', $program->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.programs.edit'), FALSE) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.programs.update', $program->id) }}" method="post" class="form-create">

        @method('PUT')
        @csrf

        <div class="tabbable-line">
            <ul class="nav nav-tabs">
                @foreach(config('translatable.locales') as $k => $locale)
                    <li class="@if($k==0) active @endif">
                        <a href="#tab_1_{{$locale}}"
                           data-toggle="tab">{{config('translatable.active_locales.'.$locale.'.name')}}
                            <span
                                class="label label-sm @if($k==0) label-default @else label-danger @endif circle">{{ucfirst($locale)}}</span>
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
                            <label>{{__('og.program_translations.title')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[title]"
                                   value="{{ old($locale . '.title', $program->translateOrNew($locale)->title) }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.program_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]"
                                      rows="3">{{ old($locale . '.description', $program->translateOrNew($locale)->description) }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.programs.is_active')}} </label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if(old('is_active', $program->is_active)){{'checked'}}@endif class="icheck"> Activé
                    </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(! old('is_active', $program->is_active)){{'checked'}}@endif class="icheck"> Désactivé
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.programs.program_page_id')}}</label>
            <select class="form-control" name="page_id">
                <option value=""></option>
                @foreach($menus as $menu)
                    <option {{ ($menu->id == old('page_id', $program->page_id))?'selected':'' }}
                            value="{{ $menu->id }}">{{ $menu->label }}</option>
                @endforeach
            </select>
        </div>

        @php
            $aspimsArray = [];
        @endphp
        @if($program->aspims)
            @foreach($program->aspims as $aspim)
                @php
                    array_push($aspimsArray, $aspim->aspim_id)
                @endphp
            @endforeach
        @endif

        <div class="form-group">
            <label>{{__('og.programs.aspims')}}</label>
            <select class="form-control" name="aspims[]" id="aspims" multiple>
                <option value="">---</option>
                @if($aspims->isNotEmpty())
                    @foreach($aspims as $aspim)
                        <option {{(in_array($aspim->id, $aspimsArray)?'selected':'')}}
                                value="{{ $aspim->id }}">{{ $aspim->mapamed_feature_id }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.programs.established_at')}} </label>
            <input autocomplete="off" type="text" class="form-control datepicker" id="established_at"
                   name="established_at" value="{{ old('established_at', $program->established_at) }}">
        </div>

        <div class="form-group">
            <label>{{__('og.programs.order')}} </label>
            <input type="number" class="form-control" name="order" value="{{ old('order', $program->order) }}">
        </div>
        <br>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection



@section('css')
    <link href="{{ asset('back/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection

@section('js')
    <script src="{{ asset("back/assets/global/plugins/select2/js/select2.full.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script>
        $(document).ready(function () {
                {{-- TODO: make this cleaner --}}
            var domain = "{{ url(config('lfm.url_prefix')) }}";

            $('#lfm-image-btn').filemanager('image', {prefix: domain});
            $('#lfm-image-thumbnail').on('change', function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#lfm-image').html('<img src="' + $(this).val() + '" style="margin:15px 10px 15px 10px;max-height:100px;">');

            });

            $("#established_at").datepicker(
                {
                    format: 'yyyy-mm-dd'
                }
            );

            $("#aspims").select2();
        });
    </script>
@stop
