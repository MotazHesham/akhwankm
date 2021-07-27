<?php

namespace App\Http\Requests;

use App\Models\BigBrother;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBigBrotherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('big_brother_edit');
    }

    public function rules()
    {
        return [ 
            'job' => [
                'string',
                'required',
            ],
            'job_place' => [
                'string',
                'required',
            ],
            'salary' => [
                'required',
            ],
            'family_male' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'family_female' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'brotherhood_reason' => [
                'required',
            ],
            'charactarstics.*' => [
                'integer',
            ],
            'charactarstics' => [
                'array',
            ],
            'skills.*' => [
                'integer',
            ],
            'skills' => [
                'array',
            ],
        ];
    }
}
