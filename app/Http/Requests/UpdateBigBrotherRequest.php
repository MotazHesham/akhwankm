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
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->user_id,
            ],
            'identity_number' => [
                'string',
                'required',
            ],
            'identity_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'dbo' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'phone' => [
                'string',
                'nullable',
            ], 
            'marital_status' => [
                'string',
                'nullable',
            ], 
            'address' => [
                'string',
                'nullable',
            ],
            'gender' => [
                'required',
            ],
            'degree' => [
                'string',
                'required',
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
            'city_id' => [
                'required', 
            ],
        ];
    }
}
