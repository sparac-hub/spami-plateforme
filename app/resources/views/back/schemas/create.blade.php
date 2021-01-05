@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.schemas.create') }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.schemas.create'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.schemas.store') }}" method="post" enctype="multipart/form-data" class="form-create">

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
                            <label>{{__('og.schema_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]"
                                   value="{{ old($locale.'.name') }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.schema_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]"
                                      rows="3">{{ old($locale.'.description') }}</textarea>
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        {{-- Begin common content --}}

        {{-- aspim liste here --}}
        <div class="form-group">
            <label>{{__('og.schemas.aspim')}} </label>
            <select class="form-control" name="aspim_id">
                <option value=""> ---</option>
                @foreach ($aspims as $aspim)
                    <option value="{{$aspim->id}}"> {{$aspim->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.schemas.order')}} </label>
            <input type="number" class="form-control" name="order" value="{{ old('order') }}">
        </div>

        <div class="form-group">
            <label>{{__('og.schemas.is_active')}} </label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1" @if(old('is_active')==1) checked @endif
                        class="icheck"> Activé </label>
                    <label>
                        <input type="radio" name="is_active" value="0" @if(old('is_active')==0) checked @endif
                        class="icheck"> Désactivé </label>
                </div>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-md-6">
                <input id="file" type="file" class="form-control" name="schema">
            </div>
        </div>

        <div class="inbox-compose-btn">
            <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>
        </div>
    </form>

    {!! set_box_foot() !!}

@endsection
