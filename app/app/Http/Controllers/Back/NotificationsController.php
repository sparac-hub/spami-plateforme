<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NotificationsController extends Controller
{
    public function index()
    {
        return view('back.notifications.index');
    }

    public function show($id)
    {
        $user = auth()->user();

        $notification = $user->notifications()->findOrFail($id);

        $notification->markAsRead();

        return view('back.notifications.show', compact('notification'));
    }
}
