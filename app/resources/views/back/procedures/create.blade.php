@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.procedures.create', $menu_id) }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.procedures.create'), FALSE) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.procedures.store') }}" method="post" enctype="multipart/form-data"
          class="form-create">

        @csrf
        <input type="hidden" name="menu_id" value="{{ request('menu_id', NULL) }}">

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
                            <label>{{__('og.procedure_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]"
                                   value="{{ old($locale.'.name') }}">
                        </div>


                        <h1>{{config('translatable.active_locales.'.$locale.'.meta_description')}}</h1>

                        <div class="form-group">
                            <label>{{__('og.procedure_translations.meta_description')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[meta_description]"
                                   value="{{ old($locale.'.meta_description') }}">
                        </div>
                        {{-- End translatable content --}}
                    </div>
                @endforeach
                <input type="hidden" name="menu_id" value="{{ request('menu_id') }}">
                <div class="form-group">
                    <label>{{__('og.procedures.procedure_category_id')}} </label>
                    <select class="form-control" name="procedure_category_id">
                        <option value=""> ---</option>
                        @if($procedure_categories)
                            @foreach ($procedure_categories as $procedure_category)
                                <option value="{{ $procedure_category->id }}"
                                        @if(old('procedure_category_id') == $procedure_category->id) selected @endif>
                                    {{ $procedure_category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>aspim </label>
                    {{--@php(dd($aspim->toArray()))--}}
                    <select class="form-control" name="aspim">
                        @foreach($aspim as $as)
                            <option value={{$as->id}}>{{$as->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        {{-- Begin common content --}}

        <div class="form-group">
            <label>{{__('og.aspims.publication_date')}} </label>
            <div class="input-group">
                <div class="icheck-inline">
                    <div class="form-group">
                        <input type="text" id="publication_date" name="publication_date"
                               value="{{ (old('publication_date'))?date('Y', strtotime(old('publication_date'))):'' }}"
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
                        <input type="radio" name="is_active" value="1" @if(old('is_active') == 1) checked @endif
                        class="icheck"> Activé </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(old('is_active') == 0) checked @endif
                               class="icheck"> Désactivé </label>
                </div>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-md-6">
                <label>Image </label>
                <input id="procedure" type="file" class="form-control" name="file">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <label>Rapport </label>
                <input id="procedure" type="file" class="form-control" name="rapport"
                       accept="application/pdf,application/vnd.ms-excel">
            </div>
        </div>

        <div class="inbox-compose-btn">
            <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>
        </div>
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
        });
    </script>
@stop
