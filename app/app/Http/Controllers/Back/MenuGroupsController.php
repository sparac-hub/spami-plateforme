<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuGroupsController extends Controller
{
    public function updateOrder(Request $request)
    {
        if ($request->ajax()) {
            if ($request->menu_group_data) {
                if ($jstree = json_decode($request->menu_group_data)) {
                    foreach ($jstree as $position => $item) {
                        Menu::find($item->id)->update(['order' => $position, 'parent_id' => null]);

                        if (isset($item->children) && !empty($item->children)) {
                            $this->get_children_nestable($item->id, $item->children);
                        }
                    }
                }
            }

            foreach (config('cms.menu_groups') as $menu_group) {
                forget_cache('menus.' . \Str::slug($menu_group));
            }

            cache()->flush(); // Todo: clear only menus cache

            return response()->json(['status' => 'success']);
        }
    }

    private function get_children_nestable($code_parent, $data)
    {
        $infoParent = Menu::find($code_parent);
        if (count($data)) {
            foreach ($data as $position => $item) {

                Menu::find($item->id)->update(['order' => $position, 'parent_id' => $code_parent, 'menu_group_id' => $infoParent->menu_group_id]);

                if (isset($item->children) && !empty($item->children)) {
                    $this->get_children_nestable($item->id, $item->children);
                }
            }
        }
    }
}
