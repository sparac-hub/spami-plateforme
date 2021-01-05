<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Cms\ParameterGroup;
use App\Http\Controllers\Controller;

class ParameterGroupsController extends Controller
{
    /**
     * @return  Response
     */
    public function index()
    {
        return view('back.parameter_groups.index');
    }

    /**
     * @return  Response
     */
    public function create()
    {
        return view('back.parameter_groups.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  Response
     */
    public function store(Request $request)
    {
        $request->request->add(['reference' => \Str::slug($request->name, '_')]);

        $parameter_group = ParameterGroup::create($request->all());

        return redirect()->route('back.parameter_groups.show',
            $parameter_group->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $parameter_group = ParameterGroup::findOrFail($id);

        return view('back.parameter_groups.show', compact('parameter_group'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit($id)
    {
        $parameter_group = ParameterGroup::findOrFail($id);

        return view('back.parameter_groups.edit', compact('parameter_group'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  Response
     */
    public function update(Request $request, $id)
    {
        $parameter_group = ParameterGroup::find($id);

        $parameter_group->update($request->all());

        return redirect()->route('back.parameter_groups.show', $parameter_group->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id)
    {
        $parameter_group = ParameterGroup::findOrFail($id);

        $parameter_group->delete();

        return redirect()->route('back.parameter_groups.index')
            ->with('success', trans('og.alert.success'));
    }

    public function datatables()
    {
        $parameter_groups = ParameterGroup::all();

        return datatables()->of($parameter_groups)
            ->editColumn('id',
                '<a href="{{route(\'back.parameter_groups.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('actions',
                '<a class="btn btn-primary btn-xs" href="{{route(\'back.parameter_groups.edit\', $id)}}" data-placement="top" data-toggle="tooltip" title="' . trans('og.button.tooltip.edit') . '" data-title="' . trans('og.button.tooltip.edit') . '" ><span class="glyphicon glyphicon-pencil"></span></a>
                   <form style="display:inline" action="{{route(\'back.parameter_groups.destroy\', $id)}}" method="POST"><input type="hidden" name="_token" value="{{csrf_token()}}"><input type="hidden" name="_method" value="DELETE" ><span data-placement="top" data-toggle="tooltip" title="' . trans('og.button.tooltip.delete') . '"><button class="btn btn-danger btn-xs" type="submit"  onclick="return confirm(\'' . trans('og.alert.confirm_deletion') . '\')" ><span class="glyphicon glyphicon-trash"></button></span></a></form>')
            ->rawColumns(['id', 'actions'])
            ->make(true);
    }
}
