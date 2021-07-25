<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutingRequest extends Model
{
    use SoftDeletes;

    public const LATE_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public const STATUS_SELECT = [
        'pending' => 'Pending',
        'accept'  => 'Accept',
        'refuse'  => 'Refuse',
        'outing'  => 'Outing',
        'done'    => 'Done',
        'cancel'  => 'Cancel',
    ];

    public $table = 'outing_requests';

    protected $dates = [
        'start_date',
        'end_date',
        'outing_date',
        'done_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'outing_type_id',
        'start_date',
        'end_date',
        'place',
        'reason',
        'late',
        'status',
        'outing_date',
        'done_time',
        'big_brother_id',
        'small_brother_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function outing_type()
    {
        return $this->belongsTo(OutingType::class, 'outing_type_id');
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getOutingDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setOutingDateAttribute($value)
    {
        $this->attributes['outing_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDoneTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDoneTimeAttribute($value)
    {
        $this->attributes['done_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function big_brother()
    {
        return $this->belongsTo(BigBrother::class, 'big_brother_id');
    }

    public function small_brother()
    {
        return $this->belongsTo(SmallBrother::class, 'small_brother_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
