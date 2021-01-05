<li class="nav-item">
    <a href="@if($module->backend_route && Route::has(''.$module->backend_route)){{ route(''.$module->backend_route) }}@endif"
       @if($module->modules->count()) class="nav-link nav-toggle" @endif>
        <i class="@if($module->icon){{ $module->icon }}@else fa fa-list @endif"></i>
        <span class="title">{{ $module->name }}</span>
        @if($module->modules->count())
            <span class="arrow"></span>
        @endif
    </a>
    @if($module->modules->count())
        <ul class="sub-menu">
            @foreach($module->modules as $child)
                @hasrole('Admin')
                <li class="nav-item">
                    <a href="@if($child->backend_route && Route::has(''.$child->backend_route)){{ route(''.$child->backend_route) }}@endif"
                       class="nav-link ">
                        <i class="@if($child->icon){{ $child->icon }}@else fa fa-list @endif"></i>
                        <span class="title">{{ $child->name }}</span>
                    </a>
                </li>
                @else
                    @can($child->backend_route)
                        <li class="nav-item">
                            <a href="@if($child->backend_route && Route::has(''.$child->backend_route)){{ route(''.$child->backend_route) }}@endif"
                               class="nav-link ">
                                <i class="@if($child->icon){{ $child->icon }}@else fa fa-list @endif"></i>
                                <span class="title">{{ $child->name }}</span>
                            </a>
                        </li>
                    @endcan
                    @endhasrole
                    @endforeach
        </ul>
    @endif
</li>
