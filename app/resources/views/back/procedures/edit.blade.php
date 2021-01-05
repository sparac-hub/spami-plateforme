@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.procedures.edit', $procedure->menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.procedures.edit'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.procedures.update', $procedure->id) }}" method="post" class="form-create"
          enctype="multipart/form-data">

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
                            <label>{{__('og.procedure_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]"
                                   value="{{old($locale.'[name]', $procedure->translateOrNew($locale)->name)}}">
                        </div>

                        <h1>{{config('translatable.active_locales.'.$locale.'.meta_description')}}</h1>

                        <div class="form-group">
                            <label>{{__('og.procedure_translations.meta_description')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[meta_description]"
                                   value="{{old($locale.'[meta_description]', $procedure->translateOrNew($locale)->meta_description)}}">
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach

                <div class="form-group">
                    <label>{{__('og.procedures.procedure_category_id')}} </label>
                    <select class="form-control" name="procedure_category_id">
                        <option value=""> ---</option>

                        @if($procedure_categories)
                            @foreach ($procedure_categories as $procedure_category)
                                <option value="{{ $procedure_category->id }}"
                                    {{ (old('procedure_category_id') == $procedure_category->id || $procedure_category->id == $procedure->procedure_category_id)?'selected':'' }}>{{ $procedure_category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label>aspim </label>
                    {{--@php(dd($aspim->toArray()))--}}
                    <select class="form-control" name="aspim">
                        @if($aspim)
                            @foreach ($aspim as $aspim_data)
                                <option value="{{ $aspim_data->id }}"
                                    {{ (old('$aspim_data') == $aspim_data->id || $aspim_data->id == $procedure->aspim)?'selected':'' }}>{{ $aspim_data->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.aspims.publication_date')}} </label>
            <div class="input-group">
                <div class="icheck-inline">
                    <div class="form-group">
                        <input type="text" id="publication_date" name="publication_date"
                               value="{{ (old('publication_date', $procedure->publication_date))?date('Y', strtotime(old('publication_date', $procedure->publication_date))):'' }}"
                               class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.procedures.is_active')}} </label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if($procedure->is_active){{'checked'}}@endif class="icheck"> Activé </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(!$procedure->is_active){{'checked'}}@endif class="icheck"> Désactivé </label>
                </div>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-md-6">
                @if (!$procedure->getMedia('file')->isEmpty())
                    <label for="link">Upload Publication
                        Procedure: {{ $procedure->getMedia('file')->first()->file_name }}</label>
                @endif
                <input id="procedure" type="file" class="form-control" name="file">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                @if (!$procedure->getMedia('rapport')->isEmpty())
                    <label for="link">Upload Publication
                        Rapport: {{ $procedure->getMedia('rapport')->first()->file_name }}</label>
                @endif
                <input id="procedure" type="file" class="form-control" name="rapport">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{__('og.button.save')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection


@section('js')
    <script src="{{ asset('/vendor/laravel-proceduremanager/js/lfm.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#publication_date").datepicker(
                {
                    format: 'yyyy',
                    viewMode: "years",
                    minViewMode: "years"
                }
            );

                {{-- TODO: make this cleaner --}}
            var domain = "{{ url(config('lfm.url_prefix')) }}";

            $('#lfm-image-btn').proceduremanager('image', {prefix: domain});
            $('#lfm-image-thumbnail').on('change', function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#lfm-image').html('<img src="' + $(this).val() + '" style="margin:15px 10px 15px 10px;max-height:100px;">');

            });
        });
    </script>
@stop
