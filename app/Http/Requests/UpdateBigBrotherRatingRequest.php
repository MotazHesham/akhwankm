<?php

namespace App\Http\Requests;

use App\Models\BigBrotherRating;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBigBrotherRatingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('big_brother_rating_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'evaluation_procedures_provided_by_specialist' => [
                'required',
            ],
            'the_quality_of_communication_with_specialist' => [
                'required',
            ],
            'evaluation_of_required_interviews_with_specialist' => [
                'required',
            ],
            'number_of_interviews' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'satisfaction_with_the_acceptance_of_the_smaller_brother' => [
                'required',
            ],
            'quality_of_offered_programs' => [
                'required',
            ],
            'evaluate_study_of_challenges_and_find_helpful_solutions' => [
                'required',
            ],
            'assessment_of_the_interaction_of_the_smaller_brother' => [
                'required',
            ],
            'big_brother_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
