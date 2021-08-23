<?php

namespace App\Http\Controllers\Bigbrother;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\BigBrother;
use Carbon\Carbon;
use Auth;

class HomeController
{
    public function index()
    { 
        return view('bigbrother.home');
    }
    public $sources = [
        [
            'model'      => '\App\Models\PeriodicSession',
            'date_field' => 'date',
            'field'      => '',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'bigbrother.home',
        ],
        [
            'model'      => '\App\Models\DatingSession',
            'date_field' => 'date',
            'field'      => '',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'bigbrother.home',
        ],
    ];

    public function calender()
    {
        $bigbrother = BigBrother::where('user_id',Auth::id())->first();
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::with(['big_brother', 'small_brother'])->where('big_brother_id',$bigbrother->id)->get() as $model) {
                if($source['model'] == '\App\Models\PeriodicSession'){
                    $color = '#CD6155';
                    $filed = 'جلسة دورية';
                }else{
                    $color = '#2E4053';
                    $filed = 'جلسة تعارف';
                }
                $crudFieldValue = $model->getAttributes()[$source['date_field']]; 
                if (!$crudFieldValue) {
                    continue;
                } 
                $events[] = [
                    'title' => trim($source['prefix'] . ' ' . $filed . ' ' . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                    'backgroundColor' => $color
                ];
            }
        }

        return view('bigbrother.calendar', compact('events'));
    }
}
