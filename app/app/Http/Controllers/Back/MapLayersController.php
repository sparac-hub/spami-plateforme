<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Requests\MapLayerRequest;
use App\Models\Cms\Menu;
use App\Http\Requests\ProgramRequest;
use App\Models\Cms\MapLayer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MapLayersController extends Controller
{
    protected $mainModel = 'App\Models\Cms\MapLayer';

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax() && $request->toggleStatus) {
            return $this->toggleStatus($request);
        }

        $menu_id = null;
        if ($request->menu_id) {
            $menu_id = $this->getMenuIdOrFail($request);
        }

        if ($request->ajax() or $request->debug) {
            return $this->datatables($request);
        }

        return view('back.map_layers.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? ['menu_id' => $request->menu_id] : [];

        $map_layer = MapLayer::withTranslation()->where($where)->select((new MapLayer())->getTable() . '.*');

        return datatables()->of($map_layer)
            ->editColumn('id', '<a href="{{route(\'back.map_layers.show\', ["id" => $id])}}">{{$id}}</a>')
            ->editColumn('is_active', function ($faq_item) {
                return $faq_item->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })->addColumn('name', function ($model) {
                return $model->translations->first()->name ?? null;
            })->addColumn('description', function ($model) {
                return $model->translations->first()->description ?? null;
            })->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })->rawColumns(['id', 'is_active', 'actions'])->make(true);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu_id = null;
        if ($request->menu_id) {
            $menu_id = $this->getMenuIdOrFail($request);
        }

        return view('back.map_layers.create', compact('menu_id'));
    }

    /**
     * @param \App\Http\Requests\ProgramRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(MapLayerRequest $request)
    {
        $map_layer = MapLayer::create($request->all());

        forget_cache('map_layers');

        return redirect()->route('back.map_layers.show', $map_layer->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(MapLayer $map_layer)
    {
        return view('back.map_layers.show', compact('map_layer'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function edit(MapLayer $map_layer)
    {
        return view('back.map_layers.edit', compact('map_layer'));
    }

    /**
     * @param \App\Http\Requests\ProgramRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(MapLayerRequest $request, $id)
    {
        $map_layer = MapLayer::find($id);

        $map_layer->update($request->all());

        forget_cache('map_layers');

        return redirect()->route('back.map_layers.show', $map_layer->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $map_layer = MapLayer::findOrFail($id);

        $menu_id = $map_layer->menu_id;

        $map_layer->delete();

        return redirect()->route('back.map_layers.index', ['menu_id' => $menu_id])
            ->with('success', trans('og.alert.success'));
    }
}
