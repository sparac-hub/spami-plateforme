<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Models\Cms\City;

class CitiesController extends CmsFrontController
{
    public function getByGovernorate($id)
    {
        $cities = City::where('governorate_id', $id)->get()->sortBy('name');

        $sorted_data = [];

        foreach ($cities as $city) {
            $sorted_data [] = ['id' => $city->id, 'name' => $city->name];
        }

        return response()->json($sorted_data);
    }
}
