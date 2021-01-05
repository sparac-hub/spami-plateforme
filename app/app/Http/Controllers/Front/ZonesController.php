<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Models\Cms\Zone;
use App\Http\Controllers\Controller;

class ZonesController extends Controller
{
    public function getByCity($id)
    {
        $zones = Zone::where('city_id', $id)->get()->sortBy('name');

        $sorted_data = [];

        foreach ($zones as $zone) {
            $sorted_data [] = [
                'id' => $zone->id,
                'name' => $zone->name,
                'postal_code' => $zone->postal_code,
            ];
        }

        return response()->json($sorted_data);
    }
}
