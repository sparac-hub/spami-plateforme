@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.widgets.create') }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.widgets.create'), false) !!}

    @include('_common.alerts.messages')

    <form action="{{ route('back.widgets.store') }}" method="post" class="form-create">

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
                            <label>{{__('og.widgets_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]"
                                   value="{{old($locale.'.name')}}" required>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.widgets_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]"
                                      rows="3">{{old($locale.'.description')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.widgets_translations.button_title')}} </label>
                            <input type="text" class="form-control" name="{{$locale}}[button_title]"
                                   value="{{old($locale.'.button_title')}}">
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.reference')}} </label>
            <input type="text" class="form-control" name="reference" value="{{ old('reference') }}">
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.placement')}} *</label>
            <select class="form-control" name="placement" required>
                <option value="0" selected disabled>---</option>
                @foreach(config('widgets.placement') as $placement)
                    <option value="{{ $placement }}" @if(old('placement') == $placement) selected @endif >
                        {{__('og.widgets.'.$placement)}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.module_id')}} *</label>
            <select class="form-control" name="module_id" id="module_id" required>
                <option value="0" selected disabled>---</option>
                @foreach($modules as $module)
                    <option value="{{$module->id}}" @if(old('module_id') == $module->id) selected @endif >
                        {{$module->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.order_column')}} </label>
            <select class="form-control" name="order_column" id="order_column" required>
                <option value="0" selected disabled>---</option>
                @if(old('order_column'))
                    <option value="{{ old('order_column') }}" selected>{{ old('order_column') }}</option>
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.order_column_type')}} *</label>
            <select class="form-control" name="order_column_type" required>
                <option value="0" selected disabled>---</option>
                @foreach(config('widgets.order_column_type') as $order => $value)
                    <option value="{{ $order }}" @if(old('order_column_type') == $order) selected @endif >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.type')}} *</label>
            <select class="form-control" name="type" required>
                <option value="0" selected disabled>---</option>
                @foreach(config('widgets.type') as $type => $value)
                    <option value="{{ $type }}" @if(old('type') == $type) selected @endif >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.select_type')}} *</label>
            <select class="form-control" name="select_type" id="select_type" required>
                <option value="0" selected disabled>---</option>
                @foreach(config('widgets.select_type') as $select_type => $value)
                    <option value="{{ $select_type }}" @if(old('select_type') == $select_type) selected @endif >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group" id="number_for_latest_div"
             style=" @if(old('select_type') == 'latest') display: block; @else display: none; @endif">
            <label>{{__('og.widgets.number_for_latest')}} *</label>
            <input type="number" class="form-control" name="number_for_latest" min="1"
                   @if(old('select_type') == 'latest') required @endif value="{{ old('number_for_latest') }}">
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.is_active')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1" class="icheck"
                               @if(old('is_active') == 1) checked @endif > {{__('og.widgets.active')}}
                    </label>
                    <label>
                        <input type="radio" name="is_active" value="0" class="icheck"
                               @if(old('is_active') == 0) checked @endif > {{__('og.widgets.desactive')}}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.order')}} *</label>
            <input type="number" class="form-control" name="order" value="{{ old('order') }}">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">{{__('og.button.create')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection


@section('js')
    @include('back.widgets.partials.js')
@stop
