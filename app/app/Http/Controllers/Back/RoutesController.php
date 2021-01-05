<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;

class RoutesController extends Controller
{
    public function __invoke()
    {
        return app('\PrettyRoutes\PrettyRoutesController')->show();
    }
}
