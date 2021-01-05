@extends('back.layouts.app')

@section('css')
    @include('back.widgets.partials_index.css')
@stop

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.front_home.index') }}
@endsection

@section('content')
    <div class="row">
        @foreach ($widgets as $widget)
            <div class="col-md-6">
                <!-- BEGIN PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-purple-plum">
                            <i class="icon-speech font-purple-plum"></i>

                            <span class="caption-subject bold uppercase">
                            {{$widget->name}}
                        </span>
                            <span class="caption-helper">
                            ------ {{__('og.widgets.module_text')}} {{$widget->module->name}} /
                            {{__('og.widgets.placement_text')}} {{$widget->placement}} ------
                        </span>
                        </div>
                        @include('back.widgets.partials_index.tools',['widget' => $widget])
                    </div>
                    @include('back.widgets.partials_index.child',['widget' => $widget])
                </div>
                <!-- END PORTLET-->
            </div>
        @endforeach
    </div>
@endsection

@section('js')
    @include('back.widgets.partials_index.js')
@stop
