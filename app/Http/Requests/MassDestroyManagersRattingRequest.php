<?php

namespace App\Http\Requests;

use App\Models\ManagersRatting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyManagersRattingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('managers_ratting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:managers_rattings,id',
        ];
    }
}
