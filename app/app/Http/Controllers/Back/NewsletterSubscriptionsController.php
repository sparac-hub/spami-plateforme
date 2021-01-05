<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cms\NewsletterSubscription;

class NewsletterSubscriptionsController extends Controller
{
    /**
     * @return  Response
     */
    public function index()
    {
        return view('back.newsletter_subscriptions.index');
    }

    /**
     * @return  Response
     */
    public function create()
    {
        return view('back.newsletter_subscriptions.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  Response
     */
    public function store(Request $request)
    {
        $newsletter_subscription = NewsletterSubscription::create($request->all());

        return redirect()->route('back.newsletter_subscriptions.show', $newsletter_subscription->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function show($id)
    {
        $newsletter_subscription = NewsletterSubscription::findOrFail($id);

        return view('back.newsletter_subscriptions.show', compact('newsletter_subscription'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function edit($id)
    {
        $newsletter_subscription = NewsletterSubscription::findOrFail($id);

        return view('back.newsletter_subscriptions.edit', compact('newsletter_subscription'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return  Response
     */
    public function update(Request $request, $id)
    {
        $newsletter_subscription = NewsletterSubscription::find($id);

        $newsletter_subscription->update($request->all());

        return redirect()->route('back.newsletter_subscriptions.show', $newsletter_subscription->id)
            ->with('success', trans('og.alert.success'));
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id)
    {
        $newsletter_subscription = NewsletterSubscription::findOrFail($id);

        $newsletter_subscription->delete();

        return redirect()->route('back.newsletter_subscriptions.index')
            ->with('success', trans('og.alert.success'));
    }

    public function datatables()
    {
        $newsletter_subscriptions = NewsletterSubscription::all();

        return datatables()->of($newsletter_subscriptions)
            //->editColumn('id', '<a href="{{route(\'back.newsletter_subscriptions.show\', ["id" => $id])}}">{{$id}}</a>')
            //->addColumn('actions',
            //       '<a class="btn btn-primary btn-xs" href="{{route(\'back.newsletter_subscriptions.edit\', $id)}}" data-placement="top" data-toggle="tooltip" title="'.trans('og.button.tooltip.edit').'" data-title="'.trans('og.button.tooltip.edit').'" ><span class="glyphicon glyphicon-pencil"></span></a>
            //       <form style="display:inline" action="{{route(\'back.newsletter_subscriptions.destroy\', $id)}}" method="POST"><input type="hidden" name="_token" value="{{csrf_token()}}"><input type="hidden" name="_method" value="DELETE" ><span data-placement="top" data-toggle="tooltip" title="'.trans('og.button.tooltip.delete').'"><button class="btn btn-danger btn-xs" type="submit"  onclick="return confirm(\''.trans('og.alert.confirm_deletion').'\')" ><span class="glyphicon glyphicon-trash"></button></span></a></form>')
            ->rawColumns(['actions'])
            ->make(true);
    }
}
