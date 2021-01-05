<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Requests\SchemaRequest;
use App\Models\Cms\Schema as ModelSchema;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cms\Aspim;

class SchemasController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Schema';

    /**
     * @return  Response
     */
    public function index(Request $request)
    {
        if ($request->ajax() && $request->toggleStatus) {
            return $this->toggleStatus($request);
        }

        if ($request->ajax() or $request->debug) {
            return $this->datatables($request);
        }
        $aspims = Aspim::all();

        return view('back.schemas.index', compact('aspims'));
    }

    public function datatables(Request $request)
    {
        $schema = ModelSchema::withTranslation()
            ->select((new ModelSchema)->getTable() . '.*');


        return datatables()->of($schema)
            ->editColumn(
                'id',
                '<a href="{{route(\'back.schemas.show\', ["id" => $id])}}">{{$id}}</a>'
            )
            ->addColumn('aspim', function ($model) {
                return isset($model->aspim->name) ?
                    '<a href="' . route('back.aspims.show',
                        $model->aspim_id) . '">' . $model->aspim->name . '</a>' :
                    null;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'actions', 'aspim'])
            ->make(true);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $aspims = Aspim::all();
        return view('back.schemas.create', compact('aspims'));
    }

    /**
     * @param \App\Http\Requests\SchemaRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(SchemaRequest $request)
    {
        $schema = ModelSchema::create($request->all());
        $schema->addMediaFromRequest('schema')
            ->toMediaCollection();

        return redirect()->route('back.schemas.show', $schema->id)->with(
            'success',
            trans('og.alert.success')
        );
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(ModelSchema $schema)
    {
        $aspims = Aspim::all();
        return view('back.schemas.show', compact('schema', 'aspims'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $aspims = Aspim::all();
        $schema = ModelSchema::with('media')->findOrFail($id);

        return view('back.schemas.edit', compact('schema', 'aspims'));
    }

    /**
     * @param \App\Http\Requests\SchemaRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(SchemaRequest $request, $id)
    {
        $data = $request->all();
        $schema = ModelSchema::with('media')->find($id);
        $schema->update($data);

        if ($request->hasFile('schema')) {
            if ($media = $schema->media->first()) {
                $media->delete();
            }
            $schema->addMediaFromRequest('schema')->toMediaCollection();
        }

        return redirect()->route('back.schemas.show', $schema->id)->with(
            'success',
            trans('og.alert.success')
        );
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schema = ModelSchema::findOrFail($id);

        $schema->delete();

        return redirect()->route('back.schemas.index')->with(
            'success',
            trans('og.alert.success')
        );
    }
}
