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
        return true;
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
                'unique:users',
            ],
            'password' => [
                'required',
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
            'marital_status' => [
                'string',
                'nullable',
            ],
            'country' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'nullable',
            ],
            'phone' => [
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
            'user_id' => [ 
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
            'cv'=>[
                'required', 
            ],
        ];
    }
}
