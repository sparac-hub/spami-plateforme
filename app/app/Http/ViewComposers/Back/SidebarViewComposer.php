<?php

namespace App\Http\ViewComposers\Back;

use Illuminate\Contracts\View\View;

class SidebarViewComposer
{
    public function compose(View $view)
    {
        $sidebarModules = \Illuminate\Support\Facades\Cache::remember('dashboard_modules.' . locale(),
            config('cms.cache_lifetime.dashboard_modules'), function () {

                return \App\Models\Cms\Module::where('parent_id', null)
                    ->whereIsOnBackendSidebar(1)
                    ->orderBy('order')
                    ->orderBy('id')
                    ->with([ // with: SubModules
                        'modules' => function ($query) {
                            $query->withTranslation();
                        },
                    ])
                    ->withTranslation()
                    ->get();

            });

        $view->with(compact('sidebarModules'));
    }
}
