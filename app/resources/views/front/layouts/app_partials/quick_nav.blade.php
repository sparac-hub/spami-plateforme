@auth
    @if(auth()->user()->hasRole('Admin'))
        <!-- BEGIN QUICK NAV -->
        <nav class="quick-nav">
            <a class="quick-nav-trigger" href="#0">
                <span aria-hidden="true"></span>
            </a>
            <ul>
                @if(isset($menu))
                    <li>
                        <a href="{{ route('back.menus.edit', $menu->id) }}" target="_blank">
                            <span>Modifier le menu</span>
                            <i class="fa fa-edit"></i>
                        </a>
                    </li>
                    @if(isset($menu->module->backend_route))
                        <li>
                            <a href="{{ route($menu->module->backend_route, ['menu_id' => $menu->id]) }}"
                               target="_blank">
                                <span>Modifier le module</span>
                                <i class="fa fa-edit"></i>
                            </a>
                        </li>
                    @endif
                @endif
                <li>
                    <a href="{{ route('back.menus.index') }}" target="_blank">
                        <span>Gestion des menus</span>
                        <i class="fa fa-cogs"></i>
                    </a>
                </li>
            </ul>
            <span aria-hidden="true" class="quick-nav-bg"></span>
        </nav>
        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
    @endif
@endauth