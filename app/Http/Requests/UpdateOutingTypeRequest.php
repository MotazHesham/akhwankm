<?php

namespace App\Http\Requests;

use App\Models\OutingType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOutingTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('outing_type_edit');
    }

    public function rules()
    {
        return [
            'name_ar' => [
                'string',
                'required',
            ],
            'name_en' => [
                'string',
                'required',
            ],
        ];
    }
}
