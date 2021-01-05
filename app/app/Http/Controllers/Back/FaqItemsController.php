<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Requests\FaqItemRequest;
use App\Models\Cms\FaqItem;
use Illuminate\Http\Request;
use App\Models\Cms\FaqCategory;
use App\Http\Controllers\Controller;

class FaqItemsController extends Controller
{
    protected $mainModel = 'App\Models\Cms\FaqItem';

    /**
     * @param Request $request
     * @return Response
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

        return view('back.faq_items.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? [(new FaqItem())->getTable() . '.menu_id' => $request->menu_id] : [];

        $faq_items = FaqItem::withTranslation()
            ->with('category.translations')
            ->where($where)
            ->select((new FaqItem)->getTable() . '.*');


        return datatables()->of($faq_items)
            ->editColumn('id',
                '<a href="{{route(\'back.faq_items.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('category', function ($model) {
                return isset($model->category->name) ?
                    '<a href="' . route('back.faq_categories.show',
                        $model->faq_category_id) . '">' . $model->category->name . '</a>' :
                    null;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'category', 'actions'])
            ->make(true);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);
        $faq_categories = FaqCategory::whereMenuId($request->menu_id)->get();

        return view('back.faq_items.create', compact('faq_categories', 'menu_id'));
    }

    /**
     * @param \App\Http\Requests\FaqItemRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(FaqItemRequest $request)
    {
        $faq_item = FaqItem::create($request->all());

        return redirect()->route('back.faq_items.show', $faq_item->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq_item = FaqItem::findOrFail($id);
        return view('back.faq_items.show', compact('faq_item'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $faq_item = FaqItem::with('category')->findOrFail($id);
        $faq_categories = FaqCategory::whereMenuId($faq_item->menu_id)->get();

        return view('back.faq_items.edit', compact('faq_item', 'faq_categories'));
    }

    /**
     * @param \App\Http\Requests\FaqItemRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(FaqItemRequest $request, $id)
    {
        $faq_item = FaqItem::find($id);
        $faq_item->update($request->all());

        return redirect()->route('back.faq_items.show', $faq_item->id)->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq_item = FaqItem::findOrFail($id);

        $menu_id = $faq_item->menu_id;

        $faq_item->delete();

        return redirect()->route('back.faq_items.index', ['menu_id' => $menu_id])
            ->with('success', trans('og.alert.success'));
    }
}
