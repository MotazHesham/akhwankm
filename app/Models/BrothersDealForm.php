<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrothersDealForm extends Model
{
    use SoftDeletes;

    public $table = 'brothers_deal_forms';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'day',
        'department_of_social_service',
        'executive_committee',
        'executive_director',
        'big_brother_id',
        'small_brother_id',
        'approvment_form_id',
        'specialist_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function big_brother()
    {
        return $this->belongsTo(BigBrother::class, 'big_brother_id');
    }

    public function small_brother()
    {
        return $this->belongsTo(SmallBrother::class, 'small_brother_id');
    }

    public function approvment_form()
    {
        return $this->belongsTo(ApprovementForm::class, 'approvment_form_id');
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
