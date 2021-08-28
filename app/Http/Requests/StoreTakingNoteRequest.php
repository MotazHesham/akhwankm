<?php

namespace App\Http\Requests;

use App\Models\TakingNote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTakingNoteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('taking_note_create');
    }

    public function rules()
    {
        return [
            'day' => [
                'required',
            ],
            'time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'small_brother_name_id' => [
                'required',
                'integer',
            ],
            'behavioral_change' => [
                'string',
                'required',
            ],
            'psychologists_opinions' => [
                'string',
                'required',
            ],
            'social_specialist_opinion' => [
                'string',
                'required',
            ],
        ];
    }
}
