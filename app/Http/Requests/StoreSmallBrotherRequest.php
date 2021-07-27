<?php

namespace App\Http\Requests;

use App\Models\SmallBrother;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSmallBrotherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('small_brother_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
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
