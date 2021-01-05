<?php

namespace App\Http\Controllers\Back;

use App\Models\Cms\Aspim;
use Illuminate\Http\Request;
use App\Models\Cms\AspimCategory;
use App\Http\Requests\AspimRequest;
use App\Http\Controllers\Controller;
use App\Models\Cms\AspimCountry;
use App\Models\Cms\Country;

class AspimsController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Aspim';

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

        return view('back.aspims.index', compact('menu_id'));
    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? [(new Aspim())->getTable() . '.menu_id' => $request->menu_id] : [];

        $aspims = Aspim::withTranslation()
            ->with('category.translations')
            ->where($where)
            ->select((new Aspim)->getTable() . '.*');

        return datatables()->of($aspims)
            ->editColumn('id',
                '<a href="{{route(\'back.aspims.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('category', function ($model) {
                return $model->category ? '<a href="' . route('back.aspim_categories.show',
                        $model->aspim_category_id) . '">' . $model->category->name . '</a>' : null;
            })
            ->addColumn('name', function ($model) {
                return $model->translations->first()->name ?? null;
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

        $aspim_mapamed_features = $this->ws();
        $aspim_categories = AspimCategory::getSelectOptionsForMenu($menu_id);
        $countries = Country::get();

        return view('back.aspims.create', compact('aspim_categories', 'aspim_mapamed_features', 'countries', 'menu_id'));
    }

    private function ws()
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', config('sparac.map_url'));

        if ($response->getStatusCode() == 200) {
            $aspim_mapamed_feature_id = [];
            $data = json_decode($response->getBody());
            foreach ($data->features as $key => $datum) {
                if (isset($datum->properties->NAME_EN)) {
                    $aspim_mapamed_feature_id[$datum->properties->NAME_EN] = $datum->id;
                }
            }

            return $aspim_mapamed_feature_id;
        }
    }

    /**
     * @param \App\Http\Requests\AspimRequest $request
     * @return  \Illuminate\Http\Response
     */
    public function store(AspimRequest $request)
    {
        $aspim = Aspim::create($request->prepared());

        if ($request->countries) {
            foreach ($request->countries as $country) {
                AspimCountry::create([
                    'aspim_id' => $aspim->id,
                    'country_id' => $country
                ]);
            }
        }

        if ($request->hasFile('image')) {
            $aspim->addMediaFromRequest('image')->toMediaCollection();
        }

        if ($request->hasFile('document')) {
            $aspim->addMediaFromRequest('document')->toMediaCollection('document');
        }

        if ($request->hasFile('gallery')) {
            $aspim->addMultipleMediaFromRequest(['gallery'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('aspim_medias');
                });
        }

        return redirect()->route('back.aspims.show', $aspim->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aspim = Aspim::withTranslation()
            ->with([
                'menu' => function ($query) {
                    $query->withTranslation();
                },
            ])->findOrFail($id);

        return view('back.aspims.show', compact('aspim'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aspim = Aspim::with('category', 'media', 'countries')->findOrFail($id);

        $aspim_mapamed_features = $this->ws();
        $aspim_categories = AspimCategory::where(['menu_id' => $aspim->menu_id, 'is_active' => 1])->get();
        $countries = Country::get();
        $selected_countries = AspimCountry::where('aspim_id', $aspim->id)->get()->pluck('country_id')->toArray();

        return view('back.aspims.edit', compact('aspim', 'aspim_categories', 'countries', 'aspim_mapamed_features', 'selected_countries'));
    }

    /**
     * @param \App\Http\Requests\AspimRequest $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(AspimRequest $request, $id)
    {
        $data = $request->prepared();

        $aspim = Aspim::with('media')->find($id);
        $aspim->update($data);

        $old_countries = AspimCountry::where('aspim_id', $aspim->id)->get();
        foreach ($old_countries as $old_country) {
            $old_country->delete();
        }

        if ($request->countries) {
            foreach ($request->countries as $country) {
                AspimCountry::create([
                    'aspim_id' => $aspim->id,
                    'country_id' => $country
                ]);
            }
        }

        if ($request->hasFile('image')) {
            if ($media = $aspim->media->first()) {
                $media->delete();
            }
            $aspim->addMediaFromRequest('image')->toMediaCollection();
        }

        if ($request->hasFile('document')) {
            if ($media = $aspim->getMedia('document')->first()) {
                $media->delete();
            }
            $aspim->addMediaFromRequest('document')->toMediaCollection('document');
        }

        if ($request->hasFile('gallery')) {
            $aspim->clearMediaCollectionExcept('aspim_medias', $aspim->getFirstMedia());
            $aspim->addMultipleMediaFromRequest(['gallery'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('aspim_medias');
                });
        }

        return redirect()->route('back.aspims.show', $aspim->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aspim = Aspim::findOrFail($id);

        $menu_id = $aspim->menu_id;

        $aspim->delete();

        return redirect()->route('back.aspims.index', ['menu_id' => $menu_id])->with('success',
            trans('og.alert.success'));
    }
}
