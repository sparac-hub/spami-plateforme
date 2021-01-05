<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Cms\MenuBanner;
use App\Http\Controllers\Controller;

class MenuBannersController extends Controller
{
    protected $mainModel = 'App\Models\Cms\MenuBanner';

    /**
     * @return  Response
     */
    public function index()
    {
        return view('back.menu_banners.index');
    }

    /**
     * @return  Response
     */
    public function create()
    {
        return view('back.menu_banners.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  Response
     */
    public function store(Request $request)
    {
        $menu_banner = MenuBanner::create($request->all());

        return redirect()->route('back.menu_banners.show', $menu_banner->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $menu_banner = MenuBanner::findOrFail($id);

        return view('back.menu_banners.show', compact('menu_banner'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit($id)
    {
        $menu_banner = MenuBanner::findOrFail($id);

        return view('back.menu_banners.edit', compact('menu_banner'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  Response
     */
    public function update(Request $request, $id)
    {
        $menu_banner = MenuBanner::find($id);

        $menu_banner->update($request->all());

        return redirect()->route('back.menu_banners.show', $menu_banner->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id)
    {
        $menu_banner = MenuBanner::findOrFail($id);

        $menu_banner->delete();

        return redirect()->route('back.menu_banners.index')
            ->with('success', trans('og.alert.success'));
    }

    public function datatables()
    {
        $menu_banners = MenuBanner::all();

        return datatables()->of($menu_banners)
            ->editColumn('id',
                '<a href="{{route(\'back.menu_banners.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'actions'])
            ->make(true);
    }
}
