<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BigBrotherRating extends Model
{
    use SoftDeletes;

    public const QUALITY_OF_OFFERED_PROGRAMS_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'Good'      => 'Good',
    ];

    public const EVALUATION_PROCEDURES_PROVIDED_BY_SPECIALIST_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'Good'      => 'Good',
    ];

    public const THE_QUALITY_OF_COMMUNICATION_WITH_SPECIALIST_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'Good'      => 'Good',
    ];

    public const EVALUATION_OF_REQUIRED_INTERVIEWS_WITH_SPECIALIST_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'Good'      => 'Good',
    ];

    public const ASSESSMENT_OF_THE_INTERACTION_OF_THE_SMALLER_BROTHER_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'Good'      => 'Good',
    ];

    public const SATISFACTION_WITH_THE_ACCEPTANCE_OF_THE_SMALLER_BROTHER_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'Good'      => 'Good',
    ];

    public const EVALUATE_STUDY_OF_CHALLENGES_AND_FIND_HELPFUL_SOLUTIONS_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'Good'      => 'Good',
    ];

    public $table = 'big_brother_ratings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'evaluation_procedures_provided_by_specialist',
        'the_quality_of_communication_with_specialist',
        'evaluation_of_required_interviews_with_specialist',
        'number_of_interviews',
        'satisfaction_with_the_acceptance_of_the_smaller_brother',
        'quality_of_offered_programs',
        'evaluate_study_of_challenges_and_find_helpful_solutions',
        'assessment_of_the_interaction_of_the_smaller_brother',
        'big_brother_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function big_brother()
    {
        return $this->belongsTo(BigBrother::class, 'big_brother_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
