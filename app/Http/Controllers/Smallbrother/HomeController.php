<?php

namespace App\Http\Controllers\Smallbrother;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    { 
        return view('smallbrother.home');
    }
}
