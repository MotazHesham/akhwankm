<?php

namespace App\Http\Requests;

use App\Models\OutingType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOutingTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('outing_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:outing_types,id',
        ];
    }
}
