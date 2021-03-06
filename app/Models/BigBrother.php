<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BigBrother extends Model
{
    use SoftDeletes;

    public $table = 'big_brothers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'job',
        'job_place',
        'salary',
        'family_male',
        'family_female',
        'brotherhood_reason',
        'small_brother_id',
        'specialist_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function specialist()
    {
        return $this->belongsTo(User::class, 'specialist_id');
    }

    public function charactarstics()
    {
        return $this->belongsToMany(Characteristic::class);
    }

    public function small_brother()
    {
        return $this->belongsTo(SmallBrother::class,'small_brother_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
