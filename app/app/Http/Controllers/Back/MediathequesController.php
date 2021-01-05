<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediathequesController extends Controller
{
    /**
     * @return  Response
     */
    public function index()
    {
        $mediatheques = Mediatheque::paginate(12);

        return view('back.mediatheques.index', compact('mediatheques'));
    }

    /**
     * @return  Response
     */
    public function create()
    {
        return view('back.mediatheques.create');
    }

    /**
     * @param Requests\StoreMediatheque $request
     * @return  Response
     */
    public function store(Requests\StoreMediatheque $request)
    {
        $banner = Mediatheque::create($request->all());

        return redirect()->route('back.mediatheques.show', $banner->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $banner = Mediatheque::findOrFail($id);
        return view('back.mediatheques.show', compact('banner'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit(Request $request, $id)
    {
        $banner = Mediatheque::findOrFail($id);

        return view('back.mediatheques.edit', compact('banner'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  Response
     */
    public function update(Request $request, $id)
    {
        $banner = Mediatheque::find($id);

        $banner->update($request->all());

        return redirect()->route('back.mediatheques.show', $banner->id)->with('success',
            trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id)
    {
        $banner = Mediatheque::findOrFail($id);

        $banner->delete();

        return redirect()->route('back.mediatheques.index')
            ->with('success', trans('og.alert.success'));
    }

    public function datatables()
    {
        $mediatheques = Mediatheque::all();

        return datatables()->of($mediatheques)
            ->editColumn('id',
                '<a href="{{route(\'back.mediatheques.show\', ["id" => $id])}}">{{$id}}</a>')
            ->editColumn('is_active', function ($banner) {
                return $banner->is_active ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';
            })
            ->addColumn('actions',
                '<a class="btn btn-primary btn-xs" href="{{route(\'back.mediatheques.edit\', $id)}}" data-placement="top" data-toggle="tooltip" title="' . trans('og.button.tooltip.edit') . '" data-title="' . trans('og.button.tooltip.edit') . '" ><span class="glyphicon glyphicon-pencil"></span></a>
                   <form style="display:inline" action="{{route(\'back.mediatheques.destroy\', $id)}}" method="POST"><input type="hidden" name="_token" value="{{csrf_token()}}"><input type="hidden" name="_method" value="DELETE" ><span data-placement="top" data-toggle="tooltip" title="' . trans('og.button.tooltip.delete') . '"><button class="btn btn-danger btn-xs" type="submit"  onclick="return confirm(\'' . trans('og.alert.confirm_deletion') . '\')" ><span class="glyphicon glyphicon-trash"></button></span></a></form>')
            //->rawColumns(['id', 'actions'])
            // ->make(true);
            ->rawColumns(['id', 'is_active', 'actions'])
            ->make(true);
    }
}
