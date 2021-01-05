<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cms\ContactRecipient;

class ContactRecipientsController extends Controller
{
    protected $mainModel = 'App\Models\Cms\ContactRecipient';

    /**
     * @return  Response
     */
    public function index(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        return view('back.contact_recipients.index', compact('menu_id'));
    }

    /**
     * @return  Response
     */
    public function create(Request $request)
    {
        $menu_id = $this->getMenuIdOrFail($request);

        return view('back.contact_recipients.create', compact('menu_id'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  Response
     */
    public function store(Request $request)
    {
        $contact_recipient = ContactRecipient::create($request->all());

        // Ajax request support
        if ($request->ajax() || $request->wantsJson()) {
            return $contact_recipient;
        } else {
            return redirect()->route('back.contact_recipients.show',
                $contact_recipient->id)->with('success',
                trans('og.alert.success'));
        }
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $contact_recipient = ContactRecipient::findOrFail($id);
        return view('back.contact_recipients.show', compact('contact_recipient'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit(Request $request, $id)
    {
        $contact_recipient = ContactRecipient::findOrFail($id);
        return view('back.contact_recipients.edit', compact('contact_recipient'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  Response
     */
    public function update(Request $request, $id)
    {
        $contact_recipient = ContactRecipient::findOrFail($id);

        $menu_id = $contact_recipient->menu_id;

        $contact_recipient->update($request->all());

        return redirect()->route('back.contact_recipients.index', ['menu_id' => $menu_id])
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id)
    {
        $contact_recipient = ContactRecipient::findOrFail($id);

        $menu_id = $contact_recipient->menu_id;
        $contact_recipient->delete();

        return redirect()->route('back.contact_recipients.index', ['menu_id' => $menu_id])
            ->with('success', trans('og.alert.success'));
    }

    public function datatables()
    {
        $contact_recipients = ContactRecipient::with('menu')->get();

        return datatables()->of($contact_recipients)
            ->editColumn('id',
                '<a href="{{route(\'back.contact_recipients.show\', ["id" => $id])}}">{{$id}}</a>')
            ->addColumn('menu', function ($model) {
                if ($model->menu) {
                    return '<a href="' . route('back.contact_messages.index', ['menu_id' => $model->menu_id]) . '">'
                        . $model->menu->translations->first()->label . '</a>';
                }
            })
            ->addColumn('actions', function ($model) {
                return $model->edit_button . ' ' . $model->delete_button;
            })
            ->rawColumns(['id', 'menu', 'actions'])
            ->make(true);
    }
}
