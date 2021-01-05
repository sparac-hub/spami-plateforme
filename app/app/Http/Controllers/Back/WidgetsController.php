<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Cms\Module;
use App\Models\Cms\Widget;
use App\Models\Cms\WidgetElement;
use App\Http\Requests\WidgetRequest;
use App\Http\Controllers\Controller;

class WidgetsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $home_id = $request->home_id ?? null;

        $widgets = Widget::whereHomeId($home_id)->orderBy('order')->get();

        return view('back.widgets.index', compact('widgets'));
    }

    /**
     * @return Response
     */
    public function create()
    {
        $modules = Module::whereNotNull('main_model')->get();

        return view('back.widgets.create', compact('modules'));
    }

    /**
     * @param \App\Http\Requests\WidgetRequest $request
     * @return Response
     */
    public function store(WidgetRequest $request)
    {
        $widget = Widget::create($request->all());

        forget_cached_widgets();

        return redirect()->route('back.widgets.index')
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param Widget $widget
     * @return \Illuminate\Http\Response
     */
    public function show(Widget $widget)
    {
        return view('back.widgets.show', compact('widget'));
    }

    /**
     * @param Widget $widget
     * @return \Illuminate\Http\Response
     */
    public function edit(Widget $widget)
    {
        $modules = Module::whereNotNull('main_model')->get();

        $order_columns = $widget->module->orderable_columns_array;

        return view('back.widgets.edit', compact('widget', 'modules', 'order_columns'));
    }

    /**
     * @param \App\Http\Requests\WidgetRequest $request
     * @param Widget $widget
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(WidgetRequest $request, Widget $widget)
    {

        if (($request->module_id != $widget->module_id) || ($request->select_type != $widget->select_type) || ($request->number_for_latest != $widget->number_for_latest)) {
            $elements = WidgetElement::where('widget_id', $widget->id)->get();

            foreach ($elements as $element) {
                $element->delete();
            }

            $widget->update($request->all());
        } else {
            $widget->update($request->all());
        }

        forget_cached_widgets();

        return redirect()->route('back.widgets.index')
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $widget = Widget::findOrFail($id);

        $widget_elements = WidgetElement::where('widget_id', $widget->id)->get();

        foreach ($widget_elements as $widget_element) {
            $widget_element->delete();
        }

        $widget->delete();

        return redirect()->route('back.widgets.index')
            ->with('success', trans('og.alert.success'));
    }
}
