@if($menu->module) {{-- This will be hidden for links --}}
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet green box">
            <div class="portlet-title">
                <div class="caption">
                    Widgets
                </div>
                <div class="tools">
                    <a href="" class="fullscreen" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body" style="display: none">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SIDEBAR -->
                        <div class="todo-ui">
                            <!-- BEGIN CONTENT -->
                            <div class="todo-content">
                                <div class="portlet light ">
                                    <!-- PROJECT HEAD -->
                                    <div class="portlet-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="dd">
                                                    @foreach ($widgets as $widget)
                                                        @php
                                                            $element = \App\Models\Cms\WidgetMenu::whereMenuId($menu->id)->whereWidgetId($widget->id)->first();
                                                        @endphp
                                                        <div id="green_or_red_{{$widget->id}}"
                                                             class="todo-tasklist-item @if($element) todo-tasklist-item-border-green @else todo-tasklist-item-border-red @endif ">
                                                            <div class="todo-tasklist-item-title checkbox_belongs">
                                                                <input type="checkbox" name="belongs"
                                                                       value="{{$widget->id}}" data="{{$menu->id}}"
                                                                       @if($element) checked @endif >
                                                                {{$widget->reference}}
                                                                in placement
                                                                {{$widget->placement}}
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
@endif
