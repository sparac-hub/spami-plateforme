<?php

namespace App\Http\Controllers\Front;

use App;
use App\Http\Requests;
use App\Http\Requests\ContactMessageRequest;
use App\Models\Cms\Menu;
use Illuminate\Http\Request;
use App\Models\Cms\ContactMessage;
use App\Models\Cms\ContactRecipient;
use App\Notifications\ContactMessageFormSubmitted;

class ContactMessagesController extends CmsFrontController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $menu = $this->getMenuFromUrl($request);

        return view(front_dir() . '.contact_messages.index', compact('menu'));
    }

    /**
     * @param \App\Http\Requests\ContactMessageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(ContactMessageRequest $request)
    {
        $contact = ContactMessage::create($request->all());

        $this->notifyRecipients($request);

        $menu = Menu::find($contact->menu_id);

        return redirect()->route('front.contact_messages.success', $menu->slug);
    }

    /**
     * Notify recipients of the given $menu_id
     *
     * @param Request $request
     */
    public function notifyRecipients(Request $request)
    {
        ContactRecipient::whereMenuId($request->menu_id)
            ->get()
            ->each(function ($contact_recipient) use ($request) {
                $contact_recipient->notify(new ContactMessageFormSubmitted($request->except('_token')));
            });
    }

    public function success($menu_slug)
    {
        $menu = $this->getMenuFromSlug($menu_slug);

        return view(front_dir() . '.contact_messages.show', compact('menu'));
    }
}
