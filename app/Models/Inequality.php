<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inequality extends Model
{
    use SoftDeletes;

    public $table = 'inequalities';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'specialist_id',
        'big_brother_id',
        'small_brother_id',
        'reasons',
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
        'user_id',
    ];

    public function specialist()
    {
        return $this->belongsTo(User::class, 'specialist_id');
    }

    public function big_brother()
    {
        return $this->belongsTo(BigBrother::class, 'big_brother_id');
    }

    public function small_brother()
    {
        return $this->belongsTo(SmallBrother::class, 'small_brother_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
