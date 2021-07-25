<?php

namespace App\Http\Requests;

use App\Models\BigBrother;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBigBrotherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('big_brother_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
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
            'degree' => [
                'string',
                'required',
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