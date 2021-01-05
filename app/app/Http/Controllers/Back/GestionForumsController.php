<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MedianetDev\Forum\Models\Discussion;

class GestionForumsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax() or $request->debug) {
            return $this->datatables($request);
        }

        return view('back.gestion_forums.index');
    }

    public function datatables(Request $request)
    {
        $forums = Discussion::with('user')->get();

        return datatables()->of($forums)
            ->editColumn('id',
                '<a href="{{route(\'back.gestion_forums.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('user_name', function ($model) {
                return optional($model->user)->{config('chatter.user.database_field_with_user_name')} ?? null;
            })
            ->addColumn('actions', function ($model) {
                return getShowButtonAttribute($model->id, 'gestion_forums') . getDeleteButtonAttribute($model->id, 'gestion_forums');
            })
            ->rawColumns(['id', 'user_name', 'actions'])
            ->make(true);
    }

    /**
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        $forum = Discussion::with(['user', 'category', 'posts'])->findOrFail($id);

        return view('back.gestion_forums.show', compact('forum'));
    }

    /**
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forum = Discussion::findOrFail($id);

        $forum->delete();

        return redirect()->route('back.gestion_forums.index')
            ->with('success', trans('og.alert.success'));
    }
}
