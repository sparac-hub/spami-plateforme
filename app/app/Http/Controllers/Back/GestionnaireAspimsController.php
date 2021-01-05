<?php

namespace App\Http\Controllers\Back;

use Illuminate\Support\Facades\Hash;
use App\Models\Cms\Aspim;
use App\Models\Cms\Country;
use App\Models\Cms\GestionnaireAspim;
use Illuminate\Http\Request;
use App\Http\Requests\GestionnaireAspimRequest;
use App\Http\Controllers\Controller;

class GestionnaireAspimsController extends Controller
{
    protected $mainModel = 'App\Models\Cms\GestionnaireAspim';

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

        return view('back.gestionnaire_aspim.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? [(new GestionnaireAspim())->getTable() . '.menu_id' => $request->menu_id] : [];

        $gestionnaire_aspim = GestionnaireAspim::withTranslation()
            ->where($where)
            ->select((new GestionnaireAspim)->getTable() . '.*');

        return datatables()->of($gestionnaire_aspim)
            ->editColumn('id',
                '<a href="{{route(\'back.gestionnaire_aspim.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'name', 'email', 'actions'])
            ->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);
        $aspims = Aspim::withTranslation()->get();
        $countries = Country::withTranslation()->get();
        return view('back.gestionnaire_aspim.create', compact('menu_id', 'aspims', 'countries'));
    }

    /**
     * @param \App\Http\Requests\AspimRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(GestionnaireAspimRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $gest_aspim = GestionnaireAspim::create($data);
        $gest_aspim->aspims()->attach($request->aspim_id);
        if ($request->hasFile('image')) {
            $gest_aspim->addMediaFromRequest('image')->toMediaCollection();
        }


        return redirect()->route('back.gestionnaire_aspim.show', $gest_aspim->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gest_aspim = GestionnaireAspim::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);
        return view('back.gestionnaire_aspim.show', compact('gest_aspim'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $gest_aspim = GestionnaireAspim::with('media', 'menu')->findOrFail($id);
        $aspims = Aspim::withTranslation()->get();
        $countries = Country::withTranslation()->get();
        $selected_aspims = array();
        if ($gest_aspim->aspims) {
            foreach ($gest_aspim->aspims as $aspim) {
                array_push($selected_aspims, $aspim->id);
            }
        }
        return view('back.gestionnaire_aspim.edit', compact('gest_aspim', 'aspims', 'countries', 'selected_aspims'));
    }

    /**
     * @param \App\Http\Requests\AspimRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(GestionnaireAspimRequest $request, $id)
    {
        $gest_aspim = GestionnaireAspim::with('media', 'aspims')->find($id);

        if ($request->password) {
            $request->merge(['password' => Hash::make($request->password)]);
        } else {
            $request->request->remove('password');
        }

        $gest_aspim->update($request->all());

        $gest_aspim->aspims()->detach($gest_aspim->aspims);
        $gest_aspim->aspims()->attach($request->aspim_id);

        if ($request->hasFile('image')) {
            if ($media = $gest_aspim->media->first()) {
                $media->delete();
            }
            $gest_aspim->addMediaFromRequest('image')->toMediaCollection();
        }

        return redirect()->route('back.gestionnaire_aspim.show', $gest_aspim->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gest_aspim = GestionnaireAspim::findOrFail($id);

        $menu_id = $gest_aspim->menu_id;

        $gest_aspim->delete();

        return redirect()->route('back.gestionnaire_aspim.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
