<?php

namespace App\Http\Controllers\CustomApp\User;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class DashboardController extends Controller
{

    /**
     * @return  Response
     */
    public function index()
    {
        $some_variable = ['var_key' => 'var_value'];

        return view('custom_app.user.dashboard.index', compact('some_variable'));
    }

}
