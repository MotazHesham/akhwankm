<?php

namespace App\Http\Requests;

use App\Models\Challenge;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreChallengeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
      
            'challengs' => [
                'required',
                'array',
            ],
            'small_brother_id' =>[

                'required',
                'integer',
            ],
            'specialist_id' => [
                'required',
                'integer',
            ],
            'other'     => [
                'nullable',
                
            ],
        ];
    }
}
