<?php

namespace App\Http\Requests;

use App\Models\ManagersRatting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreManagersRattingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('managers_ratting_create');
    }

    public function rules()
    {
        return [
            'member_of_the_board_of_directors' => [
                'string',
                'required',
            ],
            'executive_director' => [
                'string',
                'required',
            ],
            'brotherhood_specialist_id' => [
                'required',
                'integer',
            ],
            'evaluation_of_fraternity_procedures' => [
                'required',
            ],
            'evaluation_of_interviews_with_the_specialist' => [
                'required',
            ],
            'number_of_interviews' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'the_convenience_of_choosing_a_bigbrother' => [
                'required',
            ],
            'the_quality_of_the_training_program' => [
                'required',
            ],
            'evaluate_the_study_of_challenges_and_find_solutions_to_help' => [
                'required',
            ],
            'desire_to_continue_the_relationship_between_brothers' => [
                'required',
            ],
            'interaction_of_the_small_brother' => [
                'required',
            ],
            'general_notes' => [
                'required',
            ],
        ];
    }
}
