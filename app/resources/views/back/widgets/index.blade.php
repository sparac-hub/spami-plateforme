@extends('back.layouts.app')

@section('css')
    @include('back.widgets.partials_index.css')
@stop

@section('content')

    <div class="m-heading-1 border-green m-bordered">
        @if(count(config('widgets.homes')) > 1)
            <select name="home_id" id="home_id" class="btn dropdown-toggle btn-default">
                @foreach(config('widgets.homes') as $home => $nom)
                    <option value="{{ $home }}"
                            @if($home == request('home_id')) selected @endif >{{ $nom }}</option>
                @endforeach
            </select>
        @endif


        <a href="{{route('back.widgets.create')}}"
           class="btn btn-circle btn-md green" style="float: right"> {{__('og.widgets.ajouter_widget')}}
        </a>
    </div>

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

@section('modals')
@endsection

@section('js')
    @include('back.widgets.partials_index.js')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#home_id').change(function (e) {
                var home_id = $(this).val();
                window.location.replace('{{route('back.widgets.index')}}' + '?home_id=' + home_id);
            });
        });
    </script>
@stop
