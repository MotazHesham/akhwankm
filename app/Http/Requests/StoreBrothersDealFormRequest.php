<?php

namespace App\Http\Requests;

use App\Models\BrothersDealForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBrothersDealFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'day' => [
                'string',
                'required',
            ],
            'department_of_social_service' => [
                'string',
                'required',
            ],
            'executive_committee' => [
                'string',
                'required',
            ],
            'executive_director' => [
                'string',
                'required',
            ],
            'big_brother_id' => [
                'required',
                'integer',
            ],  
        ];
    }
}
