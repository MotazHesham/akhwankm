<?php

namespace App\Http\Requests;

use App\Models\TakingNote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTakingNoteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('taking_note_edit');
    }

    public function rules()
    {
        return [
            'day' => [
                'required',
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
