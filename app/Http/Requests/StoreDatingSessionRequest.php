<?php

namespace App\Http\Requests;

use App\Models\DatingSession;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDatingSessionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dating_session_create');
    }

    public function rules()
    {
        return [
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'interview_notes' => [
                'required',
            ],
            'recommendations' => [
                'required',
            ], 
            'big_brother_id' => [
                'required',
                'integer',
            ], 
        ];
    }
}
