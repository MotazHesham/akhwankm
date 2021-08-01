<?php

namespace App\Http\Requests;

use App\Models\BrothersDealForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBrothersDealFormRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('brothers_deal_form_edit');
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
            'small_brother_id' => [
                'required',
                'integer',
            ],
            'specialist_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
