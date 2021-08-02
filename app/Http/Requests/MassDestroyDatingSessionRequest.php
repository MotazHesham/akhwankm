<?php

namespace App\Http\Requests;

use App\Models\DatingSession;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDatingSessionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('dating_session_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:dating_sessions,id',
        ];
    }
}
