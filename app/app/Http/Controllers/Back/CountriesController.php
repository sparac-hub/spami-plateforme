<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountriesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Country';

    /**
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.countries.index');
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.countries.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = Country::create($request->all());

        return redirect()->route('back.countries.show', $country->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('back.countries.show', compact('country'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('back.countries.edit', compact('country'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $country = Country::find($id);
        $country->update($data);

        return redirect()->route('back.countries.show', $country->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::findOrFail($id);

        $country->delete();

        return redirect()->route('back.countries.index')
            ->with('success', trans('og.alert.success'));
    }

    public function datatables()
    {
        $countries = Country::with([
            'translations' => function ($query) {
                $query->whereLocale(locale());
            },
        ])
            ->select('countries.*');

        return datatables()->of($countries)
            ->editColumn('id',
                '<a href="{{route(\'back.countries.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('translations', function ($country) {
                return $country->translations->first()->name ?? null;
            })
            ->editColumn('is_active', function ($faq_item) {
                return $faq_item->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'actions', 'is_active'])
            ->make(true);
    }
}
