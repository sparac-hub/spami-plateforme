<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;

class LaravelFileManagerController extends Controller
{
    public function index()
    {
        return view('back.filemanager.index');
    }
}
