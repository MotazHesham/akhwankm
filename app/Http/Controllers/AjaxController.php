<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class AjaxController extends Controller
{
    public function cities(Request $request){ 
        $cities = City::where("country_id",$request->country_id)->get()->pluck('name', 'id');
        return view('partials.cities',compact('cities'));
    }
}
