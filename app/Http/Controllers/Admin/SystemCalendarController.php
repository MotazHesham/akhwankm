<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\PeriodicSession',
            'date_field' => 'date',
            'field'      => '',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.periodic-sessions.edit',
        ],
        [
            'model'      => '\App\Models\DatingSession',
            'date_field' => 'date',
            'field'      => '',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.dating-sessions.edit',
        ],
    ];

    public function index()
    {
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::with(['big_brother', 'small_brother'])->get() as $model) {
                if($source['model'] == '\App\Models\PeriodicSession'){
                    $color = '#CD6155';
                }else{
                    $color = '#2E4053';
                }
                $crudFieldValue = $model->getAttributes()[$source['date_field']]; 
                if (!$crudFieldValue) {
                    continue;
                }
                $filed = $model->big_brother->user->name ?? '';

                $events[] = [
                    'title' => trim($source['prefix'] . ' ' . $filed . ' ' . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                    'backgroundColor' => $color
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
