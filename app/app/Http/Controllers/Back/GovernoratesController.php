<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Cms\Governorate;
use App\Http\Controllers\Controller;
use App\Models\Cms\CountryTranslation;

class GovernoratesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Governorate';

    /**
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back.governorates.index');
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $country_translations = CountryTranslation::where('locale', app()->getLocale())->orderBy('name')->get();
        return view('back.governorates.create', compact('country_translations'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $governorate = Governorate::create($request->all());

        return redirect()->route('back.governorates.show', $governorate->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show(Governorate $governorate)
    {
        return view('back.governorates.show', compact('governorate'));
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function edit(Governorate $governorate)
    {
        return view('back.governorates.edit', compact('governorate'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $governorate = Governorate::find($id);

        $governorate->update($request->all());

        return redirect()->route('back.governorates.show', $governorate->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $governorate = Governorate::findOrFail($id);

        $governorate->delete();

        return redirect()->route('back.governorates.index')
            ->with('success', trans('og.alert.success'));
    }

    public function datatables()
    {
        $governorates = Governorate::with([
            'translations' => function ($query) {
                $query->whereLocale(locale());
            },
            'country.translations' => function ($query) {
                $query->whereLocale(locale());
            },
        ])->select('governorates.*');

        return datatables()->of($governorates)
            ->editColumn('id',
                '<a href="{{route(\'back.governorates.show\', ["id" => $id])}}">{{$id}}</a>')
            ->editColumn('is_active', function ($faq_item) {
                return $faq_item->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->addColumn('translations', function ($governorate) {
                return $governorate->translations->first()->name ?? null;
            })
            ->addColumn('country', function ($governorate) {
                return $governorate->country->translations->first()->name ?? null;
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'actions', 'is_active', 'country.name'])
            ->make(true);
    }
}
