<?php

namespace App\Http\Requests;

use App\Models\SmallBrotherRating;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSmallBrotherRatingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('small_brother_rating_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'suitability_of_program_and_its_help_in_developing_your_skills' => [
                'required',
            ],
            'how_much_do_you_accept_the_big_brother_sister' => [
                'required',
            ],
            'big_brother_big_sister_reacts_to_my_needs' => [
                'required',
            ],
            'sticks_to_his_appointments' => [
                'required',
            ],
            'good_to_listen_to_my_discussions' => [
                'required',
            ],
            'would_you_like_to_continue_with_big_brother' => [
                'required',
            ],
            'ease_of_registering' => [
                'required',
            ],
            'extent_of_benefit_from_the_program' => [
                'required',
            ],
        ];
    }
}
