<?php

namespace App\Http\Requests;

use App\Models\SmallBrother;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRequest extends FormRequest
{

    public function rules()
    {
        return [
            'skills.*' => [
                'integer',
            ],
            'skills' => [
                'required',
                'array',
            ],
            'charactaristics.*' => [
                'integer',
            ],
            'charactaristics' => [
               
                'array',
            ],
        ];
    }
}

