<?php

namespace App\Http\Requests;

use App\Models\Challengetype;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyChallengetypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('challengetype_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:challengetypes,id',
        ];
    }
}
