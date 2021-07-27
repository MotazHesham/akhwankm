<?php

namespace App\Http\Requests;

use App\Models\SmallBrother;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSmallBrotherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('small_brother_edit');
    }

    public function rules()
    {
        return [ 
            'skills.*' => [
                'integer',
            ],
            'skills' => [
                'required',
                'array',
            ],
            'charactaristics.*' => [
                'integer',
            ],
            'charactaristics' => [
                'required',
                'array',
            ],
        ];
    }
}
