<?php

namespace App\Services\Cms;

use App\Models\Cms\Widget;
use App\Models\Cms\WidgetElement;

// Todo ???
class CmsWidget
{
    public static function render(Widget $widget)
    {
        $widget_elements = get_widget_elements($widget);

        return view('cms_services.widgets.');
    }

    public static function getWidgetElements(Widget $widget)
    {
        $mainModel = $widget->module->main_model;

        if ($widget->select_type == "free_select") {
            $widget_elements = WidgetElement::whereWidgetId($widget->id)
                ->orderBy('order')
                ->pluck('widget_element_id');

            return $mainModel::whereIn('id', $widget_elements)
                ->whereIsActive(true)
                ->orderBy($widget->order_column, $widget->order_column_type)
                ->get();
        } else {

            return $mainModel::whereIsActive(true)
                ->orderBy($widget->order_column, $widget->order_column_type)
                ->limit($widget->number_for_latest)
                ->get();
        }
    }

}
