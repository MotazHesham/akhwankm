<?php

namespace App\Http\Controllers\Smallbrother;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\SmallBrother;
use Auth;

class HomeController
{
    public function index()
    { 
      //  $user_id=Smallbrother::where('user_id',Auth::id())->first()->id;
  
        return view('smallbrother.home');
    }
}
