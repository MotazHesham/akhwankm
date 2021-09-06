<?php

namespace App\Http\Requests;

use App\Models\Challengetype;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreChallengetypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('challengetype_create');
    }

    public function rules()
    {
        return [
            'name_en' => [
                'string',
                'required',
            ],
            'name_ar' => [
                'string',
                'required',
            ],
        ];
    }
}
