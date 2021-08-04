<?php

namespace App\Http\Controllers\Bigbrother;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    { 
        return view('bigbrother.home');
    }
}
