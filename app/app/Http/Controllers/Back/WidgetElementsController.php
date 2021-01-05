<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\Module;
use Illuminate\Http\Request;
use App\Models\Cms\WidgetElement;
use App\Http\Controllers\Controller;

class WidgetElementsController extends Controller
{
    /**
     * Add or Delete widget element from Widget
     *
     * @param Request $request
     * @return string
     */
    public function updateCollection(Request $request)
    {
        if ($request->status) {
            $element = WidgetElement::create([
                'widget_id' => $request->widget_id,
                'widget_element_id' => $request->element_id,
                'is_active' => true,
            ]);

            return json_encode(['status' => 'success', 'type' => 'add', 'widget_id' => $request->element_id]);
        } else {
            $element = WidgetElement::where('widget_element_id', $request->element_id)
                ->where('widget_id', $request->widget_id)
                ->first();
            if ($element) {
                $element->delete();

                return json_encode(['status' => 'success', 'type' => 'delete', 'widget_id' => $request->element_id]);
            }
        }
        return json_encode(['type' => 'fail']);
    }

    /**
     * Update widget elements order
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateOrder(Request $request)
    {
        if ($request->ajax()) {
            if ($request->menu_group_data) {
                if ($jstree = json_decode($request->menu_group_data)) {
                    foreach ($jstree as $position => $item) {
                        $widget_element = WidgetElement::whereWidgetElementId($item->id)->whereWidgetId($request->id)->first();

                        $widget_element->update(['order' => $position]);
                    }
                }
            }

            return response()->json(['status' => 'success']);
        }
    }

    /**
     * Get orderable columns for widget elements from Module
     *
     * @param Request $request
     * @return string
     */
    public function moduleOrderableColumns(Request $request)
    {
        $module = Module::findOrFail($request->module_id);

        return json_encode([
            'status' => 'success',
            'orderable_columns' => $module->orderable_columns_array,
        ]);
    }
}
