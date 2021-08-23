<?php

namespace App\Http\Controllers\Smallbrother;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\SmallBrother;
use App\Models\BigBrother;
use Auth;

class HomeController
{
    public function index()
    { 
      //  $user_id=Smallbrother::where('user_id',Auth::id())->first()->id;
  
        return view('smallbrother.home');
    }
    public $sources = [
      [
          'model'      => '\App\Models\PeriodicSession',
          'date_field' => 'date',
          'field'      => '',
          'prefix'     => '',
          'suffix'     => '',
          'route'      => 'smallbrother.home',
      ],
      [
          'model'      => '\App\Models\DatingSession',
          'date_field' => 'date',
          'field'      => '',
          'prefix'     => '',
          'suffix'     => '',
          'route'      => 'smallbrother.home',
      ],
    ];
    public function calender()
    {
        $smallbrother = SmallBrother::where('user_id',Auth::id())->first();
        $bigbrother = BigBrother::where('small_brother_id',$smallbrother->id)->first();
        $events = [];
        foreach ($this->sources as $source) {
          if($source['model'] == '\App\Models\PeriodicSession'){
            $data = $source['model']::with(['big_brother', 'small_brother'])->where('big_brother_id',$bigbrother->id)->get();
          }else{
            $data = $source['model']::where('small_brother_id',$smallbrother->id)->get();
          }
            foreach ($data as $model) {
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

        return view('smallbrother.calendar', compact('events'));
    }
}
