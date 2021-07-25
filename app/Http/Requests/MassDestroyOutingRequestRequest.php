<?php

namespace App\Http\Requests;

use App\Models\OutingRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOutingRequestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('outing_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:outing_requests,id',
        ];
    }
}
