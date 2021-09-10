<?php

namespace App\Http\Requests;

use App\Models\SmallBrotherRating;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySmallBrotherRatingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('small_brother_rating_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:small_brother_ratings,id',
        ];
    }
}
