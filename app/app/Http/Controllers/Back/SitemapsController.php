<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\MenuGroup;
use Illuminate\Http\Request;
use App\Models\Cms\Sitemap;
use App\Http\Controllers\Controller;

class SitemapsController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Sitemap';

    /**
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        if ($sitemap = Sitemap::first()) {
            return redirect()->route('back.sitemaps.show', ['id' => $sitemap->id, 'menu_id' => $menu_id]);
        }

        return redirect()->route('back.sitemaps.create', ['menu_id' => $menu_id]);
    }

    /**/
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        $menu_groups = MenuGroup::get();

        return view('back.sitemaps.create', compact('menu_id', 'menu_groups'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Requests\SitemapRequest $request)
    {
        $sitemap = Sitemap::create($request->all());

        return redirect()->route('back.sitemaps.show',
            $sitemap->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(Sitemap $sitemap)
    {
        $menu_groups = MenuGroup::get();

        return view('back.sitemaps.show', compact('sitemap', 'menu_groups'));
    }

    /**
     * @param Sitemap $sitemap
     * @return \Illuminate\Http\Response
     */
    public function edit(Sitemap $sitemap)
    {
        $menu_groups = MenuGroup::get();
        $menu_groups_sitemap = explode(',', $sitemap->menu_group_ids);

        return view('back.sitemaps.edit', compact('sitemap', 'menu_groups', 'menu_groups_sitemap'));
    }

    /**
     * @param Requests\SitemapRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\SitemapRequest $request, $id)
    {
        $sitemap = Sitemap::find($id);
        $sitemap->update($request->all());

        return redirect()->route('back.sitemaps.show',
            $sitemap->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sitemap = Sitemap::findOrFail($id);
        $menu_id = $sitemap->menu_id;
        $sitemap->delete();

        return redirect()->route('back.sitemaps.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? ['menu_id' => $request->menu_id] : [];

        $sitemaps = Sitemap::withTranslation()
            ->where($where)
            ->select((new Sitemap())->getTable() . '.*');

        return datatables()->of($sitemaps)
            ->editColumn('id',
                '<a href="{{route(\'back.sitemaps.show\', ["id" => $id])}}">{{$id}}</a>')
            ->editColumn('is_active', function ($faq_item) {
                return $faq_item->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->addColumn('title', function ($model) {
                return $model->translations->first()->title ?? null;
            })
            ->addColumn('description', function ($model) {
                return $model->translations->first()->description ?? null;
            })
            ->addColumn('slug', function ($model) {
                return $model->translations->first()->slug ?? null;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'is_active', 'actions'])
            ->make(true);
    }
}
