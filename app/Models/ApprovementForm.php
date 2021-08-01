<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApprovementForm extends Model
{
    use SoftDeletes;

    public $table = 'approvement_forms';

    public const APPROVED_RADIO = [
        'not_approved' => 'not_approved',
        'approved' => 'approved',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'approved',
        'specialist_id',
        'reason',
        'description',
        'descision',
        'big_brother_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function specialist()
    {
        return $this->belongsTo(User::class, 'specialist_id');
    }

    public function big_brother()
    {
        return $this->belongsTo(BigBrother::class, 'big_brother_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
