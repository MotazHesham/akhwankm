<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApprovementForm extends Model
{
    use SoftDeletes;

    public $table = 'approvement_forms';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'approved',
        'specialist_id',
        'brothers_deal_form_id',
        'reason',
        'description',
        'descision',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function specialist()
    {
        return $this->belongsTo(User::class, 'specialist_id');
    }

    public function brothers_deal_form()
    {
        return $this->belongsTo(BrothersDealForm::class, 'brothers_deal_form_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
