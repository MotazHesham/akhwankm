<?php

namespace App\Http\Requests;

use App\Models\PeriodicSession;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePeriodicSessionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('periodic_session_edit');
    }

    public function rules()
    {
        return [
            'date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'big_brother_id' => [
                'required',
                'integer',
            ], 
        ];
    }
}
