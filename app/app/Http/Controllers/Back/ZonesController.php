<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cms\CountryTranslation;

class ZonesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Zone';

    /**
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.zones.index');
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $country_translations = CountryTranslation::where('locale', app()->getLocale())->orderBy('name')->get();

        return view('back.zones.create', compact('country_translations'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zone = Zone::create($request->all());

        return redirect()->route('back.zones.show', $zone->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        return view('back.zones.show', compact('zone'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function edit(Zone $zone)
    {
        return view('back.zones.edit', compact('zone'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $zone = Zone::findOrFail($id);

        $zone->update($request->all());

        return redirect()->route('back.zones.show', $zone->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zone = Zone::findOrFail($id);

        $zone->delete();

        return redirect()->route('back.zones.index')
            ->with('success', trans('og.alert.success'));
    }

    public function datatables()
    {
        $zones = Zone::with([
            'translations' => function ($query) {
                $query->whereLocale(locale());
            },
            'city.translations' => function ($query) {
                $query->whereLocale(locale());
            },
            'governorate.translations' => function ($query) {
                $query->whereLocale(locale());
            },
            'country.translations' => function ($query) {
                $query->whereLocale(locale());
            },
        ])->select('zones.*');

        return datatables()->of($zones)
            ->editColumn('id',
                '<a href="{{route(\'back.zones.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('translations', function ($zone) {
                return $zone->translations->first()->name ?? null;
            })
            ->addColumn('city', function ($zone) {
                return $zone->city->translations->first()->name ?? null;
            })
            ->addColumn('governorate', function ($zone) {
                return $zone->governorate->translations->first()->name ?? null;
            })
            ->addColumn('country', function ($zone) {
                return $zone->country->translations->first()->name ?? null;
            })
            ->editColumn('is_active', function ($faq_item) {
                return $faq_item->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'actions', 'is_active', 'country_id', 'governorate_id', 'city_id'])
            ->make(true);
    }
}
