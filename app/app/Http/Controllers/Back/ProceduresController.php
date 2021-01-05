<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Requests\ProcedureRequest;
use App\Models\Cms\Aspim;
use App\Models\Cms\News;
use App\Models\Cms\Procedure;
use Illuminate\Http\Request;
use App\Models\Cms\ProcedureCategory;
use App\Http\Controllers\Controller;

class ProceduresController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Procedure';

    /**
     * @return  Response
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

        return view('back.procedures.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {

        $where = $request->menu_id ? [(new Procedure())->getTable() . '.menu_id' => $request->menu_id] : [];

        $procedures = Procedure::withTranslation()
            ->with(['category', 'aspim_data'])
            ->where($where)
            ->select((new Procedure)->getTable() . '.*');


        return datatables()->of($procedures)
            ->editColumn('id',
                '<a href="{{route(\'back.procedures.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('category', function ($model) {
                return isset($model->category->name) ?
                    '<a href="' . route('back.procedure_categories.show',
                        $model->procedure_category_id) . '">' . $model->category->name . '</a>' :
                    null;
            })
            ->addColumn('aspim', function ($model) {
                return isset($model->aspim_data) ?
                    '<a href="' . route('back.aspims.show',
                        $model->aspim) . '">' . optional($model->aspim_data)->name . '</a>' :
                    null;
            })
            ->addColumn('created_at', function ($model) {
                return $model->first()->created_at ? date('d-m-Y', strtotime($model->created_at)) : null;
            })
            ->addColumn('meta_description', function ($model) {
                return $model->translations->first()->meta_description ?? null;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'category', 'aspim', 'actions'])
            ->make(true);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        $aspim = Aspim::all();

        $procedure_categories = ProcedureCategory::whereMenuId($request->menu_id)->get();

        return view('back.procedures.create', compact('procedure_categories', 'menu_id', 'aspim'));
    }

    /**
     * @param \App\Http\Requests\ProcedureRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(ProcedureRequest $request)
    {
        if ($request->publication_date) {
            $request->request->set('publication_date', $request->publication_date . '-01-01');
        }

        $procedure = Procedure::create($request->all());

        $procedure->addMediaFromRequest('file')
            ->toMediaCollection('file');

        $procedure->addMediaFromRequest('rapport')
            ->toMediaCollection('rapport');

        return redirect()->route('back.procedures.show', $procedure->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(Procedure $procedure)
    {
        return view('back.procedures.show', compact('procedure'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $aspim = Aspim::all();

        $procedure = Procedure::with('category', 'media')->findOrFail($id);

        $procedure_categories = ProcedureCategory::whereMenuId($procedure->menu_id)->get();

        return view('back.procedures.edit', compact('procedure', 'procedure_categories', 'aspim'));
    }

    /**
     * @param \App\Http\Requests\ProcedureRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(ProcedureRequest $request, $id)
    {
        $data = $request->all();
        $procedure = Procedure::with('media')->find($id);
        if (!empty($data['publication_date'])) {
            $data['publication_date'] = $request->publication_date . '-01-01';
        }
        $procedure->update($data);

        if ($request->hasFile('file')) {
            if ($media = $procedure->getMedia('file')->first()) {
                $media->delete();
            }
            $procedure->addMediaFromRequest('file')->toMediaCollection('file');
        }

        if ($request->hasFile('rapport')) {
            if ($media = $procedure->getMedia('rapport')->first()) {
                $media->delete();
            }
            $procedure->addMediaFromRequest('rapport')->toMediaCollection('rapport');
        }

        return redirect()->route('back.procedures.show', $procedure->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $procedure = Procedure::findOrFail($id);

        $menu_id = $procedure->menu_id;

        $procedure->delete();

        return redirect()->route('back.procedures.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
