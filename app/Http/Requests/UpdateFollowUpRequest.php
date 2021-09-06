<?php

namespace App\Http\Requests;

use App\Models\FollowUp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFollowUpRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
     
            'specialist_id' => [
                'required',
                'integer',
            ],
            'deal' => [
                'required',
            ],
            'academic_level' => [
                'required',
            ],
            'notes' => [
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
