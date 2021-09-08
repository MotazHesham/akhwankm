<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reporting extends Model
{
    use SoftDeletes;

    public $table = 'reportings';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'report_type_id',
        'big_brother_id',
        'date',
        'day',
        'time',
        'number_of_repeat_offences',
        'violation_summary',
        'violation_justifications',
        'specialist_id',
        'committees_decision',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function report_type()
    {
        return $this->belongsTo(ReportType::class, 'report_type_id');
    }

    public function big_brother()
    {
        return $this->belongsTo(BigBrother::class, 'big_brother_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function specialist()
    {
        return $this->belongsTo(User::class, 'specialist_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
