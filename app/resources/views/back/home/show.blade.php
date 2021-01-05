@extends('back.layouts.app')

@section('css')
    <link href="{{asset('back/assets/apps/css/todo-2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/back/assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet"
          type="text/css"/>
@stop

@section('breadcrumbs')
    {{ Breadcrumbs::render('back.front_home.show') }}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN Portlet PORTLET-->
            <div class="portlet green box">

                @include('back.widgets.partials_show.title')

                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN SIDEBAR -->
                            <div class="todo-ui">
                                <!-- BEGIN CONTENT -->
                                <div class="todo-content">
                                    @include('back.widgets.partials_show.body')
                                </div>
                                <!-- END CONTENT -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Portlet PORTLET-->
        </div>
    </div>
@endsection

@section('js')
    @include('back.widgets.partials_show.js')
@endsection