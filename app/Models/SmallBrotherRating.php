<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmallBrotherRating extends Model
{
    use SoftDeletes;

    public const WOULD_YOU_LIKE_TO_CONTINUE_WITH_BIG_BROTHER_RADIO = [
        'yes' => 'yes',
        'no'  => 'no',
    ];

    public const EASE_OF_REGISTERING_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'good'      => 'good',
    ];

    public const STICKS_TO_HIS_APPOINTMENTS_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'good'      => 'good',
    ];

    public const GOOD_TO_LISTEN_TO_MY_DISCUSSIONS_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'good'      => 'good',
    ];

    public const EXTENT_OF_BENEFIT_FROM_THE_PROGRAM_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'good'      => 'good',
    ];

    public const BIG_BROTHER_BIG_SISTER_REACTS_TO_MY_NEEDS_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'good'      => 'good',
    ];

    public const HOW_MUCH_DO_YOU_ACCEPT_THE_BIG_BROTHER_SISTER_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'good'      => 'good',
    ];

    public const SUITABILITY_OF_PROGRAM_AND_ITS_HELP_IN_DEVELOPING_YOUR_SKILLS_RADIO = [
        'excellent' => 'excellent',
        'very good' => 'very good',
        'good'      => 'good',
    ];

    public $table = 'small_brother_ratings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'suitability_of_program_and_its_help_in_developing_your_skills',
        'how_much_do_you_accept_the_big_brother_sister',
        'big_brother_big_sister_reacts_to_my_needs',
        'sticks_to_his_appointments',
        'good_to_listen_to_my_discussions',
        'would_you_like_to_continue_with_big_brother',
        'ease_of_registering',
        'extent_of_benefit_from_the_program',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
