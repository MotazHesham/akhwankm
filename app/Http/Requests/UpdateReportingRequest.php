<?php

namespace App\Http\Requests;

use App\Models\Reporting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReportingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reporting_edit');
    }

    public function rules()
    {
        return [
            'report_type_id' => [
                'required',
                'integer',
            ],
            'big_brother_id' => [
                'required',
                'integer',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'day' => [
                'string',
                'required',
            ],
            'time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'number_of_repeat_offences' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'violation_summary' => [
                'required',
            ],
          
            'specialist_id' => [
                'required',
                'integer',
            ],
         
        ];
    }
}
