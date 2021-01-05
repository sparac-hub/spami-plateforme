@extends('back.layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.front_home.edit') }}
@endsection

@section('content')

    {!! set_box_head(__('breadcrumbs.back.front_home.edit'), false) !!}

    @include('_common.alerts.messages')
    <div class="alert alert-info">
        {{__('og.widgets.widget_edit_info')}}
    </div>
    <form action="{{ route('back.front_home.update', $widget->id) }}" method="post" class="form-create">

        @method('PUT')
        @csrf

        <input type="hidden" name="id" value="{{ $widget->id }}">

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
                            <label>{{__('og.widgets_translations.name')}} *</label>
                            <input type="text" class="form-control" name="{{$locale}}[name]"
                                   value="{{ old($locale.'.name', $widget->translateOrNew($locale)->name) }}">
                        </div>

                        <div class="form-group">
                            <label>{{__('og.widgets_translations.description')}} </label>
                            <textarea class="form-control" name="{{$locale}}[description]"
                                      rows="3">{{ old($locale.'.description', $widget->translateOrNew($locale)->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>{{__('og.widgets_translations.button_title')}}</label>
                            <input type="text" class="form-control" name="{{$locale}}[button_title]"
                                   value="{{ old($locale.'.button_title', $widget->translateOrNew($locale)->button_title) }}">
                        </div>

                        {{-- End translatable content --}}

                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.reference')}} </label>
            <input type="text" class="form-control" disabled value="{{$widget->reference}}">
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.placement')}} </label>
            <input type="text" class="form-control" value="{{ $widget->placement }}" disabled>
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.module_id')}} </label>
            <input type="text" class="form-control" value="{{ $widget->module->name }}" disabled>
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.order_column')}} </label>
            <select class="form-control" name="order_column" id="order_column" required>
                <option value="0" selected disabled>---</option>
                @foreach($order_columns as $order_column)
                    <option value="{{$order_column}}"
                            @if($order_column == old('order_column',$widget->order_column)) selected @endif >{{$order_column}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.order_column_type')}} </label>
            <select class="form-control" name="order_column_type" required>
                <option value="0" selected disabled>---</option>
                @foreach(config('widgets.order_column_type') as $order => $value)
                    <option value="{{ $order }}"
                            @if(old('order_column_type', $widget->order_column_type) == $order) selected @endif >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.select_type')}} </label>
            <select class="form-control" name="select_type" id="select_type" required>
                <option value="0" selected disabled>---</option>
                @foreach(config('widgets.select_type') as $select_type => $value)
                    <option value="{{ $select_type }}"
                            @if(old('select_type', $widget->select_type) == $select_type) selected @endif >
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group" id="number_for_latest_div"
             @if(old('select_type',$widget->select_type) =='free_select') style="display: none"
             @else style="display: block" @endif>
            <label>{{__('og.widgets.number_for_latest')}} </label>
            <input type="number" class="form-control" name="number_for_latest" min="1"
                   value="{{ old('number_for_latest',$widget->number_for_latest) }}"
                   @if(old('select_type',$widget->select_type) == 'latest') required @endif>
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.is_active')}} *</label>
            <div class="input-group">
                <div class="icheck-inline">
                    <label>
                        <input type="radio" name="is_active" value="1"
                               @if($widget->is_active){{'checked'}}@endif class="icheck"> {{__('og.widgets.active')}}
                    </label>
                    <label>
                        <input type="radio" name="is_active" value="0"
                               @if(!$widget->is_active){{'checked'}}@endif class="icheck"> {{__('og.widgets.desactive')}}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>{{__('og.widgets.order')}} </label>
            <input type="number" class="form-control" name="order" value="{{old('order',$widget->order)}}">
        </div>

        <br>

        <button type="submit" class="btn btn-primary">{{__('og.button.edit')}}</button>

    </form>

    {!! set_box_foot() !!}

@endsection


@section('js')
    @include('back.widgets.partials.js')
@stop
