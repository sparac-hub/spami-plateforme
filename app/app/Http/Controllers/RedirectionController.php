<?php

namespace App\Http\Controllers;

class RedirectionController extends Controller
{
    public function redirectToHomepage()
    {
        return redirect('/' . locale(), 301);
    }
}
