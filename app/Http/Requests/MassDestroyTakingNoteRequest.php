<?php

namespace App\Http\Requests;

use App\Models\TakingNote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTakingNoteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('taking_note_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:taking_notes,id',
        ];
    }
}
