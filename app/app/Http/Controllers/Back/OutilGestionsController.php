<?php

namespace App\Http\Controllers\Back;

use App\Models\Cms\Aspim;
use App\Models\Cms\OutilGestion;
use Illuminate\Http\Request;
use App\Models\Cms\OutilGestionCategory;
use App\Http\Requests\OutilGestionRequest;
use App\Http\Controllers\Controller;

class OutilGestionsController extends Controller
{
    protected $mainModel = 'App\Models\Cms\OutilGestion';

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

        return view('back.outil_gestions.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? [(new OutilGestion())->getTable() . '.menu_id' => $request->menu_id] : [];

        $outil_gestions = OutilGestion::withTranslation()
            ->with('category.translations')
            ->with('aspim.translations')
            ->where($where)
            ->select((new OutilGestion)->getTable() . '.*');

        return datatables()->of($outil_gestions)
            ->editColumn('id',
                '<a href="{{route(\'back.outil_gestions.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('category', function ($model) {
                return ($model->outil_gestion_category_id) ? '<a href="' . route('back.outil_gestion_categories.show',
                        $model->outil_gestion_category_id) . '">' . $model->category->name . '</a>' : null;
            })
            ->addColumn('aspim', function ($model) {
                return ($model->aspim_id) ? '<a href="' . route('back.aspims.show',
                        $model->aspim_id) . '">' . $model->aspim->name . '</a>' : null;
            })
            ->addColumn('type', function ($model) {
                $type = '';
                if ($model->type == OutilGestion::GUIDELINE) {
                    $type = 'GUIDELINE';
                } elseif ($model->type == OutilGestion::VIDEO) {
                    $type = 'VIDEO';
                } elseif ($model->type == OutilGestion::LIEN) {
                    $type = 'LIEN';
                } elseif ($model->type == OutilGestion::MANUEL) {
                    $type = 'MANUEL';
                }
                return $type ?? null;
            })
            ->addColumn('name', function ($model) {
                return $model->translations->first()->name ?? null;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'is_active', 'category', 'aspim', 'actions'])
            ->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        $aspims = Aspim::whereIsActive(true)->get();

        $outil_gestion_categories = OutilGestionCategory::getSelectOptionsForMenu($menu_id);

        return view('back.outil_gestions.create', compact('outil_gestion_categories', 'menu_id', 'aspims'));
    }

    /**
     * @param \App\Http\Requests\OutilGestionRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(OutilGestionRequest $request)
    {
        $outil_gestion = OutilGestion::create($request->prepared());

        foreach (config('translatable.locales') as $k => $locale) {
            if ($request->hasFile($locale . '.file_guideline')) {
                $outil_gestion->addMediaFromRequest($locale . '.file_guideline')->toMediaCollection('file_guideline/' . $locale);
            }

            if ($request->hasFile($locale . '.file_manuel')) {
                $outil_gestion->addMediaFromRequest($locale . '.file_manuel')->toMediaCollection('file_manuel/' . $locale);
            }
        }

        return redirect()->route('back.outil_gestions.show', $outil_gestion->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        $outil_gestion = OutilGestion::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);

        return view('back.outil_gestions.show', compact('outil_gestion'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $outil_gestion = OutilGestion::with('category', 'media')->findOrFail($id);

        $aspims = Aspim::whereIsActive(true)->get();

        $outil_gestion_categories = OutilGestionCategory::where(['menu_id' => $outil_gestion->menu_id, 'is_active' => 1])->get();

        return view('back.outil_gestions.edit', compact('outil_gestion', 'outil_gestion_categories', 'aspims'));
    }

    /**
     * @param \App\Http\Requests\OutilGestionRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(OutilGestionRequest $request, $id)
    {
        $data = $request->prepared();

        $outil_gestion = OutilGestion::with('media')->find($id);
        $outil_gestion->update($data);

        foreach (config('translatable.locales') as $k => $locale) {
            if ($request->hasFile($locale . '.file_guideline')) {
                if ($media = $outil_gestion->getMedia('file_guideline/' . $locale)->first()) {
                    $media->delete();
                }
                $outil_gestion->addMediaFromRequest($locale . '.file_guideline')->toMediaCollection('file_guideline/' . $locale);
            }

            if ($request->hasFile($locale . '.file_manuel')) {
                if ($media = $outil_gestion->getMedia('file_manuel/' . $locale)->first()) {
                    $media->delete();
                }
                $outil_gestion->addMediaFromRequest($locale . '.file_manuel')->toMediaCollection('file_manuel/' . $locale);
            }
        }

        return redirect()->route('back.outil_gestions.show', $outil_gestion->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outil_gestion = OutilGestion::findOrFail($id);

        $menu_id = $outil_gestion->menu_id;

        $outil_gestion->delete();

        return redirect()->route('back.outil_gestions.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
