<?php

namespace App\Http\Requests;

use App\Models\OutingRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOutingRequestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('outing_request_edit');
    }

    public function rules()
    {
        return [
            'outing_type_id' => [
                'required',
                'integer',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'place' => [
                'string',
                'required',
            ],
            'reason' => [
                'string',
                'nullable',
            ],
            'outing_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'done_time' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'big_brother_id' => [
                'required',
                'integer',
            ], 
        ];
    }
}
