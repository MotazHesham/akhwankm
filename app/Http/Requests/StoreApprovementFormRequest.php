<?php

namespace App\Http\Requests;

use App\Models\ApprovementForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreApprovementFormRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('approvement_form_create');
    }

    public function rules()
    {
        return [
            'specialist_id' => [
                'required',
                'integer',
            ],
            'brothers_deal_form_id' => [
                'required',
                'integer',
            ],
            'reason' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'descision' => [
                'required',
            ],
        ];
    }
}
