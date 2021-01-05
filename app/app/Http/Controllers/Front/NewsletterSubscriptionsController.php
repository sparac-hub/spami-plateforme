<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Cms\NewsletterSubscription;

class NewsletterSubscriptionsController extends CmsFrontController
{
    /**
     * @param Request $request
     * @return  Response
     */
    public function store(Request $request)
    {
        $newsletter_subscription = NewsletterSubscription::create($request->all());

        // Ajax request support
        if ($request->ajax() || $request->wantsJson()) {
            return $newsletter_subscription;
        } else {
            return redirect()->back()->with('success', trans('og.alert.success'));
        }
    }
}
