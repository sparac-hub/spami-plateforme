@foreach($middle_widgets as $widget)

    @php($widget_elements = get_widget_elements($widget))

    @if(!($widget_elements->isEmpty()))
        <h4>{{$widget->name}}</h4>
        <ul>
            @foreach($widget_elements as $element)
                @if($element->is_active)
                    <li>
                        @if($element->label)
                            {{$element->label}}
                            <br>
                            {{ generate_menu_url_from_obj($element) }}
                        @else
                            {{$element->name ?? $element->title ?? $element->question ?? $element->name }}
                            {{$element->order}}
                        @endif
                    </li>
                @endif

            @endforeach
        </ul>
    @endif
@endforeach
