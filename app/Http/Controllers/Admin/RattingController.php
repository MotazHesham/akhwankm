<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BigBrother;
use App\Models\BigBrotherRating;
use App\Models\SmallBrotherRating;

use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth ;

class RattingController extends Controller
{
    public function index()
    {


        $bigBrotherRatings = BigBrotherRating::with(['big_brother'])->get();

        return view('admin.Ratting.bigbrotherratting', compact('bigBrotherRatings'));
    }


    public function index1()
    {
        $smallBrotherRatings = SmallBrotherRating::all();

        return view('admin.Ratting.smallbrotherratting', compact('smallBrotherRatings'));
    }

}
