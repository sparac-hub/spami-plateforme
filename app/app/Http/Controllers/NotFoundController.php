<?php

namespace App\Http\Controllers;

class NotFoundController extends Controller
{
    public function __invoke()
    {
        abort(404);
        //return response()->view('errors.404', [], 404);
    }
}
