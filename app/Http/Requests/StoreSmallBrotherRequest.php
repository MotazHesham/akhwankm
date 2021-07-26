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
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
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
