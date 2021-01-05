<?php

namespace App\Http\ViewComposers\Front;

use App\Models\Cms\Widget;
use Illuminate\Contracts\View\View;

class WidgetsViewComposer
{
    public function compose(View $view)
    {
        $menu_id = \App\Services\Cms\CmsUrl::getMenuId();

        foreach (config('widgets.placement') as $placement) {
            ${$placement . '_widgets'} = \Illuminate\Support\Facades\Cache::remember($placement . '_widgets.' . locale() . '.' . $menu_id,
                config('cms.cache_lifetime.active_locales'), function () use ($menu_id, $placement) {
                    return Widget::getByMenuAndPlacement($placement, $menu_id);
                });
        }

        //$mainMenu = get_cached_menus('main-menu');

        $view->with(compact('bottom_widgets', 'top_widgets', 'middle_widgets', 'right_widgets', 'left_widgets'));
    }
}
