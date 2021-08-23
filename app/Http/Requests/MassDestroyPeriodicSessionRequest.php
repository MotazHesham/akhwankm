<?php

namespace App\Http\Requests;

use App\Models\PeriodicSession;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPeriodicSessionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('periodic_session_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:periodic_sessions,id',
        ];
    }
}
