<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function getCities(Request $request)
    {
        $province_id = $request->input('province_id');
        $cities = City::where('province_id', $province_id)->get();

        return response()->json(['cities' => $cities]);
    }
}
