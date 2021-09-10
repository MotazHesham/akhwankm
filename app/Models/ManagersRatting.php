<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManagersRatting extends Model
{
    use SoftDeletes;

    public const INTERACTION_OF_THE_SMALL_BROTHER_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'good'      => 'good',
    ];

    public const EVALUATION_OF_FRATERNITY_PROCEDURES_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'good'      => 'good',
    ];

    public const THE_QUALITY_OF_THE_TRAINING_PROGRAM_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'good'      => 'good',
    ];

    public const THE_CONVENIENCE_OF_CHOOSING_A_BIGBROTHER_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'good'      => 'good',
    ];

    public const EVALUATION_OF_INTERVIEWS_WITH_THE_SPECIALIST_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'good'      => 'good',
    ];

    public const DESIRE_TO_CONTINUE_THE_RELATIONSHIP_BETWEEN_BROTHERS_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'good'      => 'good',
    ];

    public const HOW_WELL_THE_BROTHERHOOD_WORK_TEAM_DEALT_AND_INTERACTED_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'good'      => 'good',
    ];

    public const EVALUATE_THE_STUDY_OF_CHALLENGES_AND_FIND_SOLUTIONS_TO_HELP_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'good'      => 'good',
    ];

    public $table = 'managers_rattings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'member_of_the_board_of_directors',
        'executive_director',
        'brotherhood_specialist_id',
        'evaluation_of_fraternity_procedures',
        'evaluation_of_interviews_with_the_specialist',
        'number_of_interviews',
        'the_convenience_of_choosing_a_bigbrother',
        'the_quality_of_the_training_program',
        'evaluate_the_study_of_challenges_and_find_solutions_to_help',
        'desire_to_continue_the_relationship_between_brothers',
        'interaction_of_the_small_brother',
        'how_well_the_brotherhood_work_team_dealt_and_interacted',
        'general_notes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function brotherhood_specialist()
    {
        return $this->belongsTo(User::class, 'brotherhood_specialist_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
