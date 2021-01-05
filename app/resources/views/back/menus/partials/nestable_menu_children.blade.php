@foreach($menus_tree as $menu)
    @can($menu['module']['backend_route'])
        <li class="dd-item" data-id="{{ $menu['id'] }}">
            <div class="dd-handle">

                {{ $menu['label'] }} <sup class="text-danger">#{{ $menu['id'] }}</sup>

                <div class="pull-right">

                <span class="label label-default label-xs hidden-xs"
                      title="Module">{{ $menu['module']['name'] ?? '' }}</span>

                    <a title="Consulter" href="{{ generate_menu_url($menu) }}" class="btn btn-xs btn-default">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a title="Activer/Désactiver" data-href="" href="#?" id="{{ $menu['id'] }}"
                       class="btn btn-{{$menu['is_active']?'primary':'default'}} btn-xs toggle-status"
                       rel="activate"><i class="fa fa-check"></i>
                    </a>

                    <div class="btn-group">
                        <a class="btn btn-xs red-mint" href="javascript:;" data-toggle="dropdown">
                            Actions
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('back.menus.create', ["parent_id" => $menu['id']]) }}">
                                    <i class="fa fa-plus"></i> Ajouter sous-menu </a>
                            </li>
                            <li>
                                <a href="{{ route('back.menus.edit', $menu['id']) }}">
                                    <i class="fa fa-edit"></i> Modifier menu </a>
                            </li>
                            @if(isset($menu['module']['backend_route'])&& Route::has($menu['module']['backend_route']))
                                <li>
                                    <a href="{{ route($menu['module']['backend_route'], ['menu_id' => $menu['id']]) }}">
                                        <i class="fa fa-edit"></i> Modifier module </a>
                                </li>
                            @endif

                            @if($menu['module']['reference'] != 'home')
                                <li>
                                    <a href="javascript:;"
                                       onclick="return confirm('{{ trans('og.alert.confirm_deletion') }}') && document.getElementById('destroy-{{ $menu['id'] }}').submit();"
                                    >
                                        <i class="fa fa-times"></i> Supprimer </a>
                                </li>
                                <form id="destroy-{{ $menu['id'] }}"
                                      action="{{ route('back.menus.destroy', $menu['id']) }}"
                                      method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <span data-placement="top" data-toggle="tooltip"
                                          title="{{ trans('og.button.delete') }}">
                                </span>
                                </form>
                            @endif
                            {{--
                            <li class="divider"> </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="i"></i> Full Settings </a>
                            </li>
                            --}}
                        </ul>
                    </div>
                </div>
            </div>
            @if(count($menu['childrens']))
                <ol class="dd-list">
                    @include('back.menus.partials.nestable_menu_children', ['menus_tree'=>$menu['childrens']])
                </ol>
            @endif
        </li>
    @endcan
@endforeach
