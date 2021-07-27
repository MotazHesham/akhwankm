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
        return Gate::allows('brothers_deal_form_create');
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
            'social_worker' => [
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
            'small_brother_id' => [
                'required',
                'integer',
            ],
            'approvement_form' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
