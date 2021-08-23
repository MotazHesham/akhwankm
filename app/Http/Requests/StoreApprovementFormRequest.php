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
        return true;
    }

    public function rules()
    {
        return [
            'approved' => [
                'required', 
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
