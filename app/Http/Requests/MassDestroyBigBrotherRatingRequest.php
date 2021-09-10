<?php

namespace App\Http\Requests;

use App\Models\BigBrotherRating;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBigBrotherRatingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('big_brother_rating_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:big_brother_ratings,id',
        ];
    }
}
