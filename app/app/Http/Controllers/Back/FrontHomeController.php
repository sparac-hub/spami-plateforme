<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Cms\ContactMessage;
use App\Models\Cms\Module;
use App\Models\Cms\Page;
use App\Models\Cms\Widget;
use App\Models\Cms\WidgetElement;
use App\User;
use DataTables;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  Response
     */
    public function index()
    {
        $widgets = Widget::whereHomeId(Widget::HOME_PAGE)->orderBy('order')->get();

        return view('back.home.index', compact('widgets'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        $widget = Widget::findOrFail($id);

        return view('back.home.show', compact('widget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $widget = Widget::findOrFail($id);

        $order_columns = $widget->module->orderable_columns_array;

        return view('back.home.edit', compact('widget', 'order_columns'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, $id)
    {
        $widget = Widget::findOrFail($id);

        if (($request->select_type != $widget->select_type) || ($request->number_for_latest != $widget->number_for_latest)) {
            $elements = WidgetElement::where('widget_id', $widget->id)->get();

            foreach ($elements as $element) {
                $element->delete();
            }

            $widget->update($request->all());
        } else {
            $widget->update($request->all());
        }

        return redirect()->route('back.front_home.index')->with('success', trans('og.alert.success'));
    }

}
