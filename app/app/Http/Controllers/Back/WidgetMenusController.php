<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\Module;
use Illuminate\Http\Request;
use App\Models\Cms\WidgetMenu;
use App\Http\Controllers\Controller;

class WidgetMenusController extends Controller
{
    /**
     * Add or remove a widget from a menu
     * @param Request $request
     * @return string
     */
    public function updateCollection(Request $request)
    {
        forget_cached_widgets();

        if ($request->status) {
            WidgetMenu::create([
                'widget_id' => $request->widget_id,
                'menu_id' => $request->menu_id,
            ]);

            return json_encode(['status' => 'success', 'type' => 'add', 'widget_id' => $request->widget_id]);
        } else {
            if ($element = WidgetMenu::where('menu_id', $request->menu_id)
                ->where('widget_id', $request->widget_id)
                ->first()
            ) {
                $element->delete();

                return json_encode(['status' => 'success', 'type' => 'delete', 'widget_id' => $request->widget_id]);
            }
        }

        return json_encode(['type' => 'fail']);
    }
}
