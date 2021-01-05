<?php

namespace App\Http\ViewComposers\Front;

use Illuminate\Contracts\View\View;

class MainMenuViewComposer
{
    public function compose(View $view)
    {
        $mainMenu = get_cached_menus('main-menu');

        $view->with(compact('mainMenu'));
    }
}
