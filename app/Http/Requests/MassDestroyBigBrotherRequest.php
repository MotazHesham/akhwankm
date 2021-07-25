<?php

namespace App\Http\Requests;

use App\Models\BigBrother;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBigBrotherRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('big_brother_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:big_brothers,id',
        ];
    }
}
