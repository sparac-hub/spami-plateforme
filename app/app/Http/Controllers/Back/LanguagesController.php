<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguagesController extends Controller
{
    /**
     * @return  Response
     */
    public function index()
    {
        return view('back.languages.index');
    }

    /**
     * @return  Response
     */
    public function create()
    {
        return view('back.languages.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  Response
     */
    public function store(Request $request)
    {
        $language = Language::create($request->all());

        return redirect()->route('back.languages.show', $language->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $language = Language::findOrFail($id);

        return view('back.languages.show', compact('language'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit($id)
    {
        $language = Language::findOrFail($id);

        return view('back.languages.edit', compact('language'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  Response
     */
    public function update(Request $request, $id)
    {
        $language = Language::find($id);

        $language->update($request->all());

        return redirect()->route('back.languages.show', $language->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id)
    {
        $language = Language::findOrFail($id);

        $language->delete();

        return redirect()->route('back.languages.index')
            ->with('success', trans('og.alert.success'));
    }

    public function datatables()
    {
        $languages = Language::all();

        return datatables()->of($languages)
            ->editColumn('id',
                '<a href="{{route(\'back.languages.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('actions',
                '<a class="btn btn-primary btn-xs" href="{{route(\'back.languages.edit\', $id)}}" data-placement="top" data-toggle="tooltip" title="' . trans('og.button.tooltip.edit') . '" data-title="' . trans('og.button.tooltip.edit') . '" ><span class="glyphicon glyphicon-pencil"></span></a>
                   <form style="display:inline" action="{{route(\'back.languages.destroy\', $id)}}" method="POST"><input type="hidden" name="_token" value="{{csrf_token()}}"><input type="hidden" name="_method" value="DELETE" ><span data-placement="top" data-toggle="tooltip" title="' . trans('og.button.tooltip.delete') . '"><button class="btn btn-danger btn-xs" type="submit"  onclick="return confirm(\'' . trans('og.alert.confirm_deletion') . '\')" ><span class="glyphicon glyphicon-trash"></button></span></a></form>')
            ->rawColumns(['id', 'actions'])
            ->make(true);
    }
}
