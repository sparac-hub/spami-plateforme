<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomepagesController extends Controller
{
    /**
     * @return  Response
     */
    public function index()
    {
        return view('back.home_pages.index');
    }
}
