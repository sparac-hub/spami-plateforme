<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Cms\Parameter;
use App\Http\Controllers\Controller;

class ParametersController extends Controller
{
    protected $mainModel = 'App\Models\Cms\Parameter';

    /**
     * @return  Response
     */
    public function index()
    {
        $parameters = Parameter::with('parameter_group')->get();

        return view('back.parameters.index', compact('parameters'));
    }

    /**
     * Update parameters.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateKeyValuePairs(Request $request)
    {
        // Remove password if the SMTP Auth is not required
        if ($request->has('mail_username') && !$request->has('smtpauth')) {
            $parameter = Parameter::where('reference', 'mail_password')->first();
            if ($parameter) {
                $parameter->update(['value' => null]);
                cache()->clear('parameters.mail_password');
            }
        }

        foreach ($request->all() as $reference => $value) {
            $parameter = Parameter::where('reference', $reference)->first();

            if ($parameter) {
                if (($reference != 'mail_password') or ($reference == 'mail_password' && $value)) {
                    $parameter->update(['value' => $value]);
                }
                cache()->forget('parameters.' . $reference);
            }

        }

        // TODO: Add these to observer so we remove these items automatically from cache
        cache()->forget('parameters.');
        cache()->forget('parameter_group_' . $parameter->parameter_group->reference);

        return response()->json(['result' => 'success']);
    }

    /**
     * @return  Response
     */
    public function create()
    {
        return view('back.parameters.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  Response
     */
    public function store(Request $request)
    {
        $parameter = Parameter::create($request->all());

        return redirect()->route('back.parameters.show', $parameter->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $parameter = Parameter::findOrFail($id);
        return view('back.parameters.show', compact('parameter'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit(Request $request, $id)
    {
        $parameter = Parameter::findOrFail($id);
        return view('back.parameters.edit', compact('parameter'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $parameter = Parameter::find($id);

        $parameter->update($data);

        // Ajax request support
        if ($request->ajax() || $request->wantsJson()) {
            return $parameter;
        } else {
            return redirect()->route('back.parameters.show', $parameter->id)->with('success',
                trans('og.alert.success'));
        }
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id, Request $request)
    {
        if ($parameter = Parameter::find($id)) {
            $wasDeleted = $parameter->delete();
        }

        // Ajax request support
        if ($request->ajax() || $request->wantsJson()) {
            return isset($wasDeleted) ? $wasDeleted : false;
        } else {
            if (isset($wasDeleted) and $wasDeleted) {
                return redirect()->route('back.parameters.index')->with('success',
                    trans('og.alert.success'));
            } else {
                return redirect()->back()->withErrors([0 => trans('og.alert.error')]);
            }
        }
    }

    public function datatables()
    {
        $parameters = Parameter::all();
        return datatables()->of($parameters)
            ->editColumn('id',
                '<a href="{{route(\'back.parameters.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'actions'])
            ->make(true);
    }
}
