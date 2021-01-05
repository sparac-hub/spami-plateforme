<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cms\CountryTranslation;

class CitiesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\City';

    /**
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.cities.index');
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $country_translations = CountryTranslation::where('locale', app()->getLocale())->orderBy('name')->get();
        return view('back.cities.create', compact('country_translations'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = City::create($request->all());

        return redirect()->route('back.cities.show', $city->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view('back.cities.show', compact('city'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('back.cities.edit', compact('city'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $city = City::find($id);
        $city->update($data);

        return redirect()->route('back.cities.show', $city->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);

        $city->delete();

        return redirect()->route('back.cities.index')
            ->with('success', trans('og.alert.success'));
    }

    public function datatables()
    {
        $cities = City::with([
            'translations' => function ($query) {
                $query->whereLocale(locale());
            },
            'governorate.translations' => function ($query) {
                $query->whereLocale(locale());
            },
            'country.translations' => function ($query) {
                $query->whereLocale(locale());
            },
        ])->select('cities.*');

        return datatables()->of($cities)
            ->editColumn('id',
                '<a href="{{route(\'back.cities.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('translations', function ($city) {
                return $city->translations->first()->name ?? null;
            })
            ->addColumn('governorate', function ($city) {
                return $city->governorate->translations->first()->name ?? null;
            })
            ->addColumn('country', function ($city) {
                return $city->country->translations->first()->name ?? null;
            })
            ->editColumn('is_active', function ($faq_item) {
                return $faq_item->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->editColumn('country_id', function ($city) {
                return '<a href="' . route('back.countries.show',
                        $city->country_id) . '">' . $city->country->name . '</a>';
            })
            ->editColumn('governorate_id', function ($city) {
                return '<a href="' . route('back.governorates.show',
                        $city->governorate_id) . '">' . $city->governorate->name . '</a>';
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'actions', 'is_active', 'country_id', 'governorate_id'])
            ->make(true);
    }
}
