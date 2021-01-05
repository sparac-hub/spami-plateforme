<?php

namespace App\Http\Controllers\Front;

use App\Models\Cms\Menu;
use App\Models\Cms\News;
use Illuminate\Http\Request;
use App\Models\Cms\NewsCategory;
use Illuminate\Support\Facades\DB;

class NewsController extends CmsFrontController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request, Menu $menu)
    {
        $news = News::FrontFilter($request, $menu);
        $pays = $this->GetListPays();
        if ($request->ajax()) {
            $view_list = view(front_dir() . '.news.partials.list_index', compact('news'))->render();

            return response()->json(['resultat' => true, 'view_list' => $view_list]);
        }
        $categories = NewsCategory::whereIsActive(true)->get();

        return view(front_dir() . '.news.index', compact('news', 'categories', 'menu', 'pays'));
    }

    private function GetListPays()
    {
        $local = locale();
        $pays = DB::table('news_translations')->where('locale', '=', $local)->distinct()->select('pays')->get();
        return $pays;
    }

    /**
     * @param string $slug
     * @return  Response
     */
    public function show(string $slug)
    {
        $news = News::whereIsActive(true)
            ->with(['translations', 'menu', 'media_album'])
            ->whereHas('translations', function ($query) use ($slug) {
                $query->whereSlug($slug)->whereLocale(locale());
            })
            ->firstOrFail();

        $menu = $news->menu;

        return view(front_dir() . '.news.show', compact('news', 'menu'));
    }

    /**
     * Show News Category and list all active items under this category
     */
    public function category($menu_slug, $category)
    {
        $menu = $this->getMenuFromSlug($menu_slug);

        $news = News::whereHas('category.translations', function ($query) use ($category) {
            $query->whereSlug($category);
        })
            ->where([
                'is_active' => 1,
                'menu_id' => $menu->id,
            ])
            ->withTranslation()
            ->with(['menu'])
            ->paginate(config('cms.front_pagination.news')); // Todo make this variable news per page

        return view(front_dir() . '.news.index', compact('news', 'menu'));
    }

}
