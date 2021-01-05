<?php

namespace App\Http\Controllers\Back;

use App\Models\Cms\User;
use App\Http\Requests;
use App\Models\Cms\Page;
use App\Models\Cms\ContactMessage;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return  Response
     */
    public function index()
    {

        $active_pages_number = Page::active()->count();
        $active_users_number = User::count();
        $contact_messages_number = ContactMessage::count();

        return view('back.dashboard.index',
            compact('active_pages_number', 'active_users_number', 'contact_messages_number'));
    }
}
