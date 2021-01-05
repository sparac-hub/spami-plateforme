<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class PagesController extends Controller
{
    /**
     * @return  Response
     */
    public function index()
    {
        return view('back.pages.index');
    }

    /**
     * @return  Response
     */
    public function create()
    {
        return view('back.pages.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  Response
     */
    public function store(Request $request)
    {
        $page = Page::create($request->all());

        return redirect()->route('back.pages.show', $page->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show(Request $request, $id)
    {
        $page = Page::with('menu')->findOrFail($id);

        if ($request->redirect_to_menu) {
            return redirect()->route('back.menus.edit', $page->menu->id);
        }

        return redirect()->route('front.pages.show', $page->menu->id);
    }

    /**
     * @param int $menu_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editByMenuId(int $menu_id): RedirectResponse
    {
        $page = Page::whereMenuId($menu_id)->firstOrFail();

        return redirect()->route('back.pages.edit', $page->id);
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view('back.pages.edit', compact('page'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $page->update($request->all());

        return redirect()->route('back.menus.index')
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id, Request $request)
    {
        $page = Page::findOrFail($id);

        $page->delete();

        return redirect()->route('back.pages.index')
            ->with('success', trans('og.alert.success'));
    }

    public function datatables()
    {
        $pages = Page::withTranslation()->get();

        return datatables()->of($pages)
            ->editColumn('id', '<a href="{{route(\'back.pages.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('actions',
                '<a class="btn btn-primary btn-xs" href="{{route(\'back.pages.edit\', $id)}}" data-placement="top" data-toggle="tooltip" title="' . trans('og.button.tooltip.edit') . '" data-title="' . trans('og.button.tooltip.edit') . '" ><span class="glyphicon glyphicon-pencil"></span></a>
                <a class="btn btn-default btn-xs" href="{{route(\'back.pages.show\', $id)}}" data-placement="top" data-toggle="tooltip" title="' . trans('og.button.tooltip.show') . '" data-title="' . trans('og.button.tooltip.show') . '" ><span class="glyphicon glyphicon-eye-open"></span></a>
                <a class="btn btn-warning btn-xs" href="{{route(\'back.pages.show\', [\'id\' => $id, \'redirect_to_menu\' => 1])}}" data-placement="top" data-toggle="tooltip" title="' . trans('og.pages.index_button_show_menu') . '" data-title="' . trans('og.pages.index_button_show_menu') . '" ><span class="glyphicon glyphicon-list"></span></a>
                ')
            ->rawColumns(['id', 'actions'])
            ->make(true);
    }
}
