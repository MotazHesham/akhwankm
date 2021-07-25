<?php

namespace App\Http\Requests;

use App\Models\BrothersDealForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBrothersDealFormRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('brothers_deal_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:brothers_deal_forms,id',
        ];
    }
}
