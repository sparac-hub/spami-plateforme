<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModulesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Module';

    /**
     * @return  Response
     */
    public function index()
    {
        return view('back.modules.index');
    }

    /**
     * @return  Response
     */
    public function create()
    {
        return view('back.modules.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  Response
     */
    public function store(Request $request)
    {
        // TODO: Optimization: add this to an observer so it will be created automatically on "Model::create()" action
        $request->request->add(['reference' => \Str::slug($request->name, '_')]);

        $modules = Module::create($request->all());

        cache()->flush();

        return redirect()->route('back.modules.show', $modules->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $modules = Module::findOrFail($id);

        return view('back.modules.show', compact('modules'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit($id)
    {
        $module = Module::findOrFail($id);

        return view('back.modules.edit', compact('module'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  Response
     */
    public function update(Request $request, $id)
    {
        $modules = Module::find($id);

        $modules->update($request->all());

        cache()->flush();

        return redirect()->route('back.modules.index')->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id, Request $request)
    {
        $modules = Module::findOrFail($id);

        $modules->delete();

        return redirect()->route('back.modules.index')
            ->with('success', trans('og.alert.success'));
    }

    public function datatables()
    {
        $modules = Module::all();

        return datatables()->of($modules)
            //->editColumn('id', '<a href="{{route(\'back.modules.show\', ["id" => $id])}}">{{$id}}</a>')
            ->editColumn('icon', function ($module) {
                return $module->icon ? '<a class="btn btn-default"><i class="' . $module->icon . '"></i></a> ' : '-';
            })
            ->editColumn('is_active', function ($module) {
                return $module->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->editColumn('is_menu_module', function ($module) {
                return $module->is_menu_module ? '<span class="label label-success">Menu Module</span>' : '<span class="label label-default">Not a Menu Module</span>';
            })
            ->editColumn('is_on_backend_sidebar', function ($module) {
                return $module->is_on_backend_sidebar ? '<span class="label label-success">On Sidebar</span>' : '<span class="label label-default">Not on sidebar</span>';
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['icon', 'is_active', 'is_on_backend_sidebar', 'is_menu_module', 'actions'])
            ->make(true);
    }
}
