<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Models\Cms\Governorate;
use App\Http\Controllers\Controller;

class GovernoratesController extends Controller
{
    public function getByCountry($id)
    {
        return Governorate::where('country_id', $id)
            ->get()
            ->sortBy('name')
            ->map(function ($governorate) {
                return [
                    'id' => $governorate->id,
                    'name' => $governorate->name,
                ];
            })->values();
    }
}
