<div class="portlet-body">
    <div class="row">
        <div class="col-md-12 col-sm-12">

            <div class="alert alert-info">
                Only Active elements can be selected
                <br>
                <ul>
                    <li style="color: green">
                        Green : Active and Selected
                    </li>
                    <li style="color: blue">
                        Blue : Active and not Selected
                    </li>
                    <li style="color: red">
                        Red : Not active and cannot be selected
                    </li>
                </ul>
            </div>

            <div class="todo-tasklist" id="show_here_listing">
                @php
                    $data = get_elements_for_show_widget($widget);
                @endphp

                @if(!$data['elements']->isEmpty())
                    @foreach($data['elements'] as $element)
                        <div id="green_or_red_{{$element->id}}"
                             class="todo-tasklist-item
                                @if($element->is_active && in_array($element->id,$data['pluck_elements']))
                                 todo-tasklist-item-border-green
@elseif($element->is_active)
                                 todo-tasklist-item-border-blue
@else
                                 todo-tasklist-item-border-red
@endif
                                 ">

                            <div class="todo-tasklist-item-title">
                                <input type="checkbox" name="belongs" class="checkbox_belongs"
                                       @if(!$element->is_active) disabled @endif
                                       @if(in_array($element->id,$data['pluck_elements'])) checked @endif
                                       data="{{$widget->id}}"
                                       value="{{$element->id}}">
                                #{{$element->id}}
                            </div>

                            <div class="todo-tasklist-item-text">
                                @if($element->label)
                                    {{ widget_element_label($element,500) }}
                                    <br>
                                    {{ generate_menu_url_from_obj($element) }}
                                @else
                                    {{ widget_element_label($element,500) }}
                                @endif
                            </div>

                        </div>
                    @endforeach
                    {!! $data['elements']->links('front.layouts.app_partials.pagination') !!}
                @endif
            </div>
        </div>
        <div class="todo-tasklist-devider"></div>
    </div>
</div>
