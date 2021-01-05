<div class="portlet-body">
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
                                    <div class="dd" id="nestable_list_{{ $widget->id }}">
                                        <ol class="dd-list">
                                            @php
                                                $elements = get_widget_elements($widget);
                                            @endphp

                                            @foreach($elements as $element)
                                                @if($widget->select_type == "free_select")
                                                    <li class="dd-item"
                                                        data-id="{{ $element->id }}">
                                                        <div class="dd-handle">
                                                            {{ widget_element_label($element,90) }}
                                                            <sup class="text-danger">#{{ $element->id }}</sup>
                                                        </div>
                                                    </li>
                                                @else
                                                    <div class="m-heading-1 border-green m-bordered">
                                                        {{ widget_element_label($element,90) }}
                                                        <sup class="text-danger">#{{ $element->id }}</sup>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </ol>
                                        @if($widget->select_type == "free_select")
                                            <input type="hidden"
                                                   id="nestable_list_ids_{{$widget->id}}" value="">
                                            <button id="{{$widget->id}}"
                                                    class="btn green-meadow btn-block nestable_list_button">{{__('og.widgets.save_order')}}
                                            </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="todo-tasklist-devider"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
        </div>
    </div>
</div>