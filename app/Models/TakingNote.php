<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TakingNote extends Model
{
    use SoftDeletes;

    public const DAY_SELECT = [
        'Saturday'  => 'Saturday',
        'Sunday'    => 'Sunday',
        'Monday'    => 'Monday',
        'Tuesday'   => 'Tuesday',
        'Wednesday' => 'Wednesday',
        'Thursday'  => 'Thursday',
        'Friday'    => 'Friday',
    ];

    public $table = 'taking_notes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'day',
        'specialist_name_id',
        'time',
        'small_brother_name_id',
        'behavioral_change',
        'psychologists_opinions',
        'social_specialist_opinion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function specialist_name()
    {
        return $this->belongsTo(User::class, 'specialist_name_id');
    }

    public function small_brother_name()
    {
        return $this->belongsTo(SmallBrother::class, 'small_brother_name_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
