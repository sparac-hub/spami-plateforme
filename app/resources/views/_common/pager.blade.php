<ul class="pager">
    @if($previous_record)
        <li class="previous">
            <a href="{{ route($route_name, $previous_record->id) }}"
               class="btn blue">
                <i class="fa fa-angle-left"></i> Previous </a>
        </li>
    @endif
    @if($next_record)
        <li class="next">
            <a href="{{ route($route_name, $next_record->id) }}"
               class="btn blue"> Next
                <i class="fa fa-angle-right"></i>
            </a>
        </li>
    @endif
</ul>
