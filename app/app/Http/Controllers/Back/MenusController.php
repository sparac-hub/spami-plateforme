<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Requests\MenuRequest;
use App\Models\Cms\Menu;
use App\Models\Cms\Page;
use App\Models\Cms\Module;
use App\Models\Cms\Widget;
use Illuminate\Http\Request;
use App\Models\Cms\MenuGroup;
use App\Http\Requests\StoreMenu;
use App\Http\Requests\UpdateMenu;
use App\Models\Cms\MenuTranslation;
use App\Http\Controllers\Controller;

class MenusController extends Controller
{
    /**
     * @return  Response
     */
    public function index()
    {
        $menuGroups = MenuGroup::with(['menus.module'])->get();

        $disableFormValidation = true;

        return view('back.menus.index_nestable', compact('menuGroups', 'disableFormValidation'));
    }

    /**
     * @param Request $request
     * @return  Response
     */
    public function create(Request $request)
    {
        // $menu_groups = MenuGroup::with('menus')->get();
        $menu_group_id = $request->menu_group_id;
        $parent_id = $request->parent_id;

        if ($parent_id) {
            $parent_menu = Menu::withTranslation()->find($parent_id);

            if ($parent_menu) {
                $menu_group_id = $parent_menu->menu_group_id;
            }
        }
        return view('back.menus.create', compact('menu_group_id', 'parent_id'));
    }

    /**
     * @param \App\Http\Requests\MenuRequest $request
     * @return  Response
     */
    public function store(MenuRequest $request)
    {
        $menu = Menu::create($request->all());

        if (optional($menu->module)->reference == 'pages') {
            Page::createForMenuId($menu->id);
        }

        cache()->clear(); // Todo: clear only menus cache : forget_cache(string $key)

        return redirect()->route('back.menus.index')->with('success',
            trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $menu = Menu::findOrFail($id);

        return view('back.menus.show', compact('menu'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit($id)
    {
        $menu = Menu::with('translations')->findOrFail($id);

        $widgets = Widget::whereNull('home_id')->get();

        $menus = Menu::where('menu_group_id', $menu->menu_group_id)
            ->withTranslation()
            ->get()
            ->toArray();

        $tree = buildTree($menus, $id);

        $children_id = [];

        if (!empty($tree)) {
            $children_id = getAllChildIds($tree);
        }

        $parent_id = $menu->parent_id;

        return view('back.menus.edit', compact('menu', 'parent_id', 'children_id', 'elements_table', 'widgets'));
    }

    /**
     * Edit module based on menu_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editModule(Request $request)
    {
        if ($request->id) {
            $menu = Menu::findOrFail($request->id);

            // redirection based on the module_reference (Page, Quotation, FAQ,...)
            if ($menu->module->reference == 'pages') { // Pages module
                return redirect()->route('back.pages.edit', $menu->page->id);
            } elseif ($menu->module->reference == 'faqs') { // FAQ module
                return redirect()->route('back.faq_categories.index');
            }

            return redirect()->route('back.menus.index');
        }
    }

    /**
     * @param \App\Http\Requests\MenuRequest $request
     * @param int $id
     * @return   Response
     */
    public function update(MenuRequest $request, $id)
    {
        $menu = Menu::find($id);

        if ($request->link_type_id != 1) {
            $menu->update(['module_id' => null]);
        }

        $old_menu_id = optional($menu->module)->id;
        $new_module_id = (int)$request->module_id;

        if ($new_module_id != $old_menu_id) {
            if ($main_model = optional($menu->module)->main_model) {
                $module_elements = $main_model::where('menu_id', $id)->get();
                foreach ($module_elements as $module_element) {
                    if ($module_element->translations) {
                        foreach ($module_element->translations as $translation) {
                            $translation->delete();
                        }
                    }
                    $module_element->delete();
                }
            }
        }


        $menu->update($request->all());

        if (optional($menu->module)->reference == 'pages') {
            Page::createForMenuId($menu->id);
        }

        cache()->clear(); // Todo: clear only menus cache : forget_cache(string $key)

        return redirect()->route('back.menus.index')
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        if (optional($menu->module)->reference != 'home') {

            foreach ($menu->translations as $menu_translation) {
                $menu_translation->delete();
            }

            $menu->delete();

            return redirect()->route('back.menus.index')
                ->with('success', trans('og.alert.success'));

        }
        return redirect()->route('back.menus.index')
            ->with('error', trans('og.alert.error'));
    }

    public function datatables()
    {
        $menus = Menu::all();

        return datatables()->of($menus)
            ->editColumn('id', '<a href="{{route(\'back.menus.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('actions',
                '<a class="btn btn-primary btn-xs" href="{{route(\'back.menus.edit\', $id)}}" data-placement="top" data-toggle="tooltip" title="' . trans('og.button.tooltip.edit') . '" data-title="' . trans('og.button.tooltip.edit') . '" ><span class="glyphicon glyphicon-pencil"></span></a>
                   <form style="display:inline" action="{{route(\'back.menus.destroy\', $id)}}" method="POST"><input type="hidden" name="_token" value="{{csrf_token()}}"><input type="hidden" name="_method" value="DELETE" ><span data-placement="top" data-toggle="tooltip" title="' . trans('og.button.tooltip.delete') . '"><button class="btn btn-danger btn-xs" type="submit"  onclick="return confirm(\'' . trans('og.alert.confirm_deletion') . '\')" ><span class="glyphicon glyphicon-trash"></button></span></a></form>')
            ->rawColumns(['id', 'actions'])
            ->make(true);
    }

    public function toggleStatus(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id) {
                $menu = Menu::find($request->id);
                $menu->is_active = ($menu->is_active) ? 0 : 1;
                $menu->save();
            }

            cache()->clear();

            return response()->json(['status' => 'success', 'is_active' => $menu->is_active]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFormByLinkTypeId(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $locale = $request->local;
            $menu = Menu::find($request->id);

            if ($request->link_type_id == 1) {
                return view('back.menus.form.module', compact('locale', 'menu'));
            } elseif ($request->link_type_id == 2) {
                return view('back.menus.form.internal_link', compact('locale', 'menu'));
            } elseif ($request->link_type_id == 3) {
                return view('back.menus.form.external_link', compact('locale', 'menu'));
            } elseif ($request->link_type_id == 4) {
                return view('back.menus.form.menu', compact('locale', 'menu'));
            }
        }
    }

    public function add_template_element_for_menu($id)
    {
        $menu = Menu::with('translations')->findOrFail($id);

        $menus = Menu::where('menu_group_id', $menu->menu_group_id)
            ->withTranslation()
            ->get()
            ->toArray();

        $tree = buildTree($menus, $id);

        $children_id = [];

        if (!empty($tree)) {
            $children_id = getAllChildIds($tree);
        }

        $parent_id = $menu->parent_id;

        return view('back.menus.edit', compact('menu', 'parent_id', 'children_id'));
    }
}
