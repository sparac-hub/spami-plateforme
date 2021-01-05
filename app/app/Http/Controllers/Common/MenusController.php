<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Cms\Event;
use App\Models\Cms\MenuGroup;
use App\Models\Cms\MenuTranslation;

use App\Models\Cms\Module;
use DataTables;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    /**
     * @param Request $request
     * @return json
     */
    public function getMenusByMenuGroupId(Request $request)
    {
        // Accessible via ajax only
        if ($request->ajax() || $request->wantsJson()) {
            $menu_group = MenuGroup::with('menus')->findOrfail($request->menu_group_id);

            $menus_tree = buildTree($menu_group->menus->sortBy('order')->toArray());

            $params = ['menus_tree' => $menus_tree, 'niv' => ''];

            return view('back.menus.partials.select_options_menu_children', $params);
        }
    }

    public function checkSlug(Request $request)
    {
        if ($request->ajax()) {
            if ($request->slug && $request->name) {
                $slug = $request->slug;
                $name = $request->name;
                $name = trim($name, ']');
                $explode = explode('[', $name);
                $locale = $explode[0];

                $menu_translation = MenuTranslation::where([
                    'locale' => $locale,
                    'slug' => $slug,
                ])
                    ->where('menu_id', '!=', $request->id)
                    ->first();

                if (isset($menu_translation->id)) {
                    return json_encode(['rst' => 0]);
                }
                return json_encode(['rst' => 1]);
            }
        }
    }

    public function checkModuleSlug(Request $request)
    {
        if ($request->ajax()) {
            if ($request->slug && $request->name) {
                $reference = $request->reference;
                $slug = $request->slug;
                $name = $request->name;
                $name = trim($name, ']');
                $explode = explode('[', $name);
                $locale = $explode[0];

                $menu_id = $request->menu_id;
                $id = $request->id;

                $module = Module::whereReference($reference)->firstOrFail();

                $relation = rtrim($reference, "s");

                $module_translation = '';
                if ($module) {
                    $module_translation = '\\' . $module->main_model . 'Translation';
                }

                if ($module_translation) {
                    $menu_translation = $module_translation::where([
                        'locale' => $locale,
                        'slug' => $slug,
                    ])->where($relation . '_id', '!=', $id)
                        ->first();

                    if (isset($menu_translation->id)) {
                        return json_encode(['rst' => 0]);
                    }
                    return json_encode(['rst' => 1]);
                } else {
                    return json_encode(['rst' => 1]);
                }
            }
        }
    }

}
