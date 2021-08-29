<?php

namespace App\Http\Requests;

use App\Models\Inequality;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInequalityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('inequality_edit');
    }

    public function rules()
    {
        return [
            'specialist_id' => [
                'required',
                'integer',
            ],
            'big_brother_id' => [
                'required',
                'integer',
            ],
            'small_brother_id' => [
                'required',
                'integer',
            ],
            'reasons' => [
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
