<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\Locale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocalesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Locale';

    /**
     * @return  Response
     */
    public function index()
    {
        return view('back.locales.index');
    }

    /**
     * @return  Response
     */
    public function create()
    {
        return view('back.locales.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  Response
     */
    public function store(Request $request)
    {
        $locale = Locale::create($request->all());

        $this->checkDefaultIntegrity($locale);

        return redirect()->route('back.locales.index')
            ->with('success', trans('og.alert.success'));
    }

    /**
     * Make sure that only one locale is set to default
     * If the default is [not active], then we'll make it [active]
     * @param Locale $locale
     */
    public function checkDefaultIntegrity(Locale $locale)
    {
        // If the current is set to default
        if ($locale->is_default) {
            // make sure that the current locale is active
            if (!$locale->is_active) {
                $locale->update(['is_active' => 1]);
            }
            // make sure the others are not default
            Locale::whereIsDefault(1)
                ->where('id', '!=', $locale->id)
                ->get()
                ->each(function ($locale, $i) {
                    $locale->update(['is_default' => 0]);
                });
        }

        // Make sure that at least one locale is set to default
        if (!Locale::whereIsDefault(1)->count()) {
            Locale::whereIsActive(true)
                ->first()
                ->update(['is_default' => 1]);
        }
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $locale = Locale::findOrFail($id);

        return view('back.locales.show', compact('locale'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit($id)
    {
        $locale = Locale::findOrFail($id);

        return view('back.locales.edit', compact('locale'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  Response
     */
    public function update(Request $request, $id)
    {
        $locale = Locale::find($id);

        $locale->update($request->all());

        $this->checkDefaultIntegrity($locale);

        cache()->flush(); // Destroy all cached DB data

        return redirect()->route('back.locales.index')
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id)
    {
        $locale = Locale::findOrfail($id);

        // The default locale can not be removed
        if (!$locale->is_default) {
            $locale->delete();

            return redirect()->route('back.locales.index')
                ->with('success', trans('og.alert.success'));
        }

        return redirect()->back()->withErrors(trans('og.alert.error'));
    }

    public function datatables()
    {
        $locales = Locale::all();

        return datatables()->of($locales)
            ->editColumn('id',
                '<a href="{{route(\'back.locales.show\', ["id" => $id])}}">{{$id}}</a>')
            ->editColumn('is_active', function ($locale) {
                return $locale->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->editColumn('is_default', function ($locale) {
                return $locale->is_default ? '<span class="label label-success">Default</span>' : '<span class="label label-default">Not default</span>';
            })
            ->editColumn('is_rtl', function ($locale) {
                return $locale->is_rtl ? 'RTL' : 'LTR';
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })->rawColumns(['id', 'is_active', 'is_default', 'actions'])
            ->make(true);
    }
}
