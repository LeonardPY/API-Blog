<?php

namespace App\Http\Requests\AuthRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name" => [
                "string",
                "max:100"
            ],
            "password" => [
                'min:6',
            ]
        ];
    }
}
