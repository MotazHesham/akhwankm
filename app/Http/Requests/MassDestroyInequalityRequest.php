<?php

namespace App\Http\Requests;

use App\Models\Inequality;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInequalityRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('inequality_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:inequalities,id',
        ];
    }
}
