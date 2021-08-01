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
            'approved' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'specialist_id' => [
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
            'big_brother_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
