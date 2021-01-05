@foreach($right_widgets as $widget)

    @php($widget_elements = get_widget_elements($widget))

    @if(!($widget_elements->isEmpty()))
        @if(optional($widget->module)->reference == 'banners')
            @foreach($widget_elements as $element)
                @if($element->is_active)
                    {!! $element->description !!}
                @endif
            @endforeach
        @endif
    @endif
@endforeach
