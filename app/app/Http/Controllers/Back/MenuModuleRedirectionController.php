<?php

namespace App\Http\Controllers\Back;

use App\Models\Cms\Menu;
use App\Http\Controllers\Controller;

class MenuModuleRedirectionController extends Controller
{
    public function __invoke(int $menu_id)
    {
        $menu = Menu::select('module_id')
            ->with([
                'module' => function ($query) {
                    $query->select('id', 'backend_route')->whereIsMenuModule(true);
                },
            ])->findOrFail($menu_id);

        if (isset($menu->module->backend_route)) {
            return redirect()->route($menu->module->backend_route, ['menu_id' => $menu_id]);
        }

        abort(404);
    }
}
