<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Requests\ContactMessageRequest;
use Illuminate\Http\Request;
use App\Models\Cms\ContactMessage;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\ContactMessagesExport;

class ContactMessagesController extends Controller
{
    protected $mainModel = 'App\Models\Cms\ContactMessage';

    /**
     * @return  Response
     */
    public function index()
    {
        return view('back.contact_messages.index');
    }

    /**
     * @return  Response
     */
    public function create()
    {
        return view('back.contact_messages.create');
    }

    /**
     * @param \App\Http\Requests\ContactMessageRequest $request
     * @return  Response
     */
    public function store(ContactMessageRequest $request)
    {
        $contact_message = ContactMessage::create($request->all());

        // Ajax request support
        if ($request->ajax() || $request->wantsJson()) {
            return $contact_message;
        } else {
            return redirect()->route('back.contact_messages.show',
                $contact_message->id)->with('success', trans('og.alert.success'));
        }
    }

    /**
     * @param Contact $contact_message
     * @return  Response
     */
    public function show(ContactMessage $contact_message)
    {
        if (!$contact_message->read_at) {
            $contact_message->read_at = date('Y-m-d H:i:s');
            $contact_message->save();
        }
        return view('back.contact_messages.show', compact('contact_message'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit(Request $request, $id)
    {
        $contact_message = ContactMessage::findOrFail($id);
        return view('back.contact_messages.edit', compact('contact_message'));
    }

    /**
     * @param \App\Http\Requests\ContactMessageRequest $request
     * @param int $id
     * @return  Response
     */
    public function update(ContactMessageRequest $request, $id)
    {
        $data = $request->all();
        $contact_message = ContactMessage::find($id);

        $contact_message->update($data);

        // Ajax request support
        if ($request->ajax() || $request->wantsJson()) {
            return $contact_message;
        } else {
            return redirect()->route('back.contact_messages.show',
                $contact_message->id)->with('success', trans('og.alert.success'));
        }
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id, Request $request)
    {
        $contact_message = ContactMessage::findOrFail($id);

        $contact_message->delete();

        return redirect()->route('back.contact_messages.index')
            ->with('success', trans('og.alert.success'));

    }

    public function datatables(Request $request)
    {
        $where = $request->menu_id ? ['menu_id' => $request->menu_id] : [];

        $contact_messages = ContactMessage::where($where)->with([
            'menu' => function ($query) {
                $query->withTranslation();
            },
        ])->get();

        return datatables()->of($contact_messages)
            ->editColumn('id',
                '<a href="{{route(\'back.contact_messages.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('menu', function ($model) {
                if ($model->menu) {
                    return '<a href="' . route('back.contact_messages.index', ['menu_id' => $model->menu_id]) . '">'
                        . $model->menu->translations->first()->label . '</a>';
                }
            })
            ->addColumn('actions', function ($model) {
                return $model->enable_button . ' ' . $model->show_button . ' ' . $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'menu', 'actions'])
            ->make(true);
    }

    public function export()
    {
        return Excel::download(new ContactMessagesExport, 'contact_mesages.xlsx');
    }
}
