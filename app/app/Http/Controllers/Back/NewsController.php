<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\News;
use Illuminate\Http\Request;
use App\Models\Cms\MediaAlbum;
use App\Models\Cms\NewsCategory;
use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    protected $mainModel = 'App\Models\Cms\News';

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax() && $request->toggleStatus) {
            return $this->toggleStatus($request);
        }

        $menu_id = $this->getMenuIdOrFail($request);

        if ($request->ajax() or $request->debug) {
            return $this->datatables($request);
        }

        return view('back.news.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? [(new News())->getTable() . '.menu_id' => $request->menu_id] : [];

        $news = News::withTranslation()
            ->with('category')
            ->where($where)
            ->select((new News)->getTable() . '.*');

        return datatables()->of($news)
            ->editColumn('id',
                '<a href="{{route(\'back.news.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('category', function ($model) {
                return isset($model->category->name) ?
                    '<a href="' . route('back.news_categories.show',
                        $model->news_category_id) . '">' . $model->category->name . '</a>' :
                    null;
            })
            ->addColumn('slug', function ($model) {
                return $model->translations->first()->slug ?? null;
            })
            ->addColumn('name', function ($model) {
                return $model->translations->first()->name ?? null;
            })
            ->addColumn('description', function ($model) {
                return $model->translations->first()->description ?? null;
            })
            ->addColumn('image', function ($model) {
                return $model->translations->first()->image ?? null;
            })
            ->addColumn('content', function ($model) {
                return $model->translations->first()->content ?? null;
            })
            ->addColumn('meta_title', function ($model) {
                return $model->translations->first()->meta_title ?? null;
            })
            ->addColumn('meta_description', function ($model) {
                return $model->translations->first()->meta_description ?? null;
            })
            ->editColumn('is_active', function ($faq_item) {
                return $faq_item->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'is_active', 'category', 'actions'])
            ->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        $news_categories = NewsCategory::whereMenuId($request->menu_id)->get();

        $media_albums = MediaAlbum::whereIsActive(true)->get();

        return view('back.news.create', compact('news_categories', 'media_albums', 'menu_id'));
    }

    /**
     * @param \App\Http\Requests\NewsRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $news = News::create($request->all());

        foreach (config('translatable.locales') as $k => $locale) {
            if ($request->hasFile($locale . '.image')) {
                $news->addMediaFromRequest($locale . '.image')->toMediaCollection($news->id . '/' . $locale);
            }
        }

        return redirect()->route('back.news.show', $news->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);

        return view('back.news.show', compact('news'));
    }

    /**
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $news_categories = NewsCategory::whereMenuId($news->menu_id)->get();

        $media_albums = MediaAlbum::whereIsActive(true)->get();

        return view('back.news.edit', compact('news', 'news_categories', 'media_albums'));
    }

    /**
     * @param \App\Http\Requests\NewsRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {

        $news = News::findOrFail($id);

        $news->update($request->all());

        foreach (config('translatable.locales') as $k => $locale) {
            if ($request->hasFile($locale . '.image')) {
                $news->clearMediaCollectionExcept($news->id . '/' . $locale, $news->getFirstMedia());
                $news->addMediaFromRequest($locale . '.image')->toMediaCollection($news->id . '/' . $locale);
            }
        }

        return redirect()->route('back.news.show', $news->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        $menu_id = $news->menu_id;

        $news->delete();

        return redirect()->route('back.news.index', ['menu_id' => $menu_id])
            ->with('success', trans('og.alert.success'));
    }
}
