<?php

namespace App\Http\Requests;

use App\Models\Characteristic;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCharacteristicRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('characteristic_edit');
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
