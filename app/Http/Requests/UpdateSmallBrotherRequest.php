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
            'gender' => [
                'required',
            ],
            'degree' => [
                'string',
                'required',
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
