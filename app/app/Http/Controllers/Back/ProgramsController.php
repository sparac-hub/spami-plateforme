<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\Menu;
use App\Models\Cms\Page;
use App\Models\Cms\ProgramAspim;
use App\Http\Requests\ProgramRequest;
use App\Models\Cms\Aspim;
use App\Models\Cms\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramsController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Program';

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
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

        return view('back.programs.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? ['menu_id' => $request->menu_id] : [];

        $program = Program::withTranslation()
            ->where($where)->select((new Program())->getTable() . '.*');

        return datatables()->of($program)
            ->editColumn('id',
                '<a href="{{route(\'back.programs.show\', ["id" => $id])}}">{{$id}}</a>')
            ->editColumn('is_active', function ($faq_item) {
                return $faq_item->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->addColumn('title', function ($model) {
                return $model->translations->first()->title ?? NULL;
            })
            ->addColumn('description', function ($model) {
                return $model->translations->first()->description ?? NULL;
            })/*
            ->addColumn('category', function ($model) {
                return $model->category->link ?? null;
            })*/
            ->addColumn('established_at', function ($model) {
                return $model->protocol . $model->url ?? NULL;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'is_active', 'actions'])
            ->make(TRUE);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);
        $aspims = Aspim::all();

        $menus = Menu::whereHas('module', function ($query) {
            $query->where('reference', 'pages');
        })->get();

        return view('back.programs.create', compact('menu_id', 'aspims', 'menus'));
    }

    /**
     * @param \App\Http\Requests\ProgramRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(ProgramRequest $request)
    {

        $program = Program::create($request->all());

        if ($request->aspims) {
            foreach ($request->aspims as $aspim) {
                ProgramAspim::create([
                    'aspim_id' => $aspim,
                    'program_id' => $program->id,
                ]);
            }
        }

        forget_cache('programs');

        return redirect()->route('back.programs.show', $program->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        $linkedPage = Menu::find($program->page_id);
        return view('back.programs.show', compact('program', 'linkedPage'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $aspims = Aspim::all();

        $programs = ProgramAspim::where([
            'program_id' => $program->id,
        ]);

        $menus = Menu::whereHas('module', function ($query) {
            $query->where('reference', 'pages');
        })->get();

        return view('back.programs.edit', compact('program', 'aspims', 'programs', 'menus'));
    }

    /**
     * @param \App\Http\Requests\ProgramRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(ProgramRequest $request, $id)
    {
        $program = Program::find($id);

        $program->update($request->all());

        ProgramAspim::where('program_id', $id)->delete();

        if ($request->aspims) {
            foreach ($request->aspims as $aspim) {
                ProgramAspim::create([
                    'aspim_id' => $aspim,
                    'program_id' => $program->id,
                ]);
            }
        }

        forget_cache('programs');

        return redirect()->route('back.programs.show', $program->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);

        $menu_id = $program->menu_id;

        $program->delete();

        return redirect()->route('back.programs.index', ['menu_id' => $menu_id])
            ->with('success', trans('og.alert.success'));
    }
}
