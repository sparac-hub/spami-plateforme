<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Models\Cms\Widget;

class HomeController extends CmsFrontController
{
    /**
     * @return  Response
     */
    public function index()
    {
        $widgets = Widget::whereHomeId(Widget::HOME_PAGE)->get();

        return view(front_dir() . '.home.index', compact('widgets'));
    }
}
