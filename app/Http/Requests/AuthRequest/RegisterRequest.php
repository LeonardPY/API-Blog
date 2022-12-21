<?php

namespace App\Http\Requests\AuthRequest;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            "name" => [
                'required',
                'string',
                'max:100'
            ],
            "email" => [
                'required',
                'unique:users',
                'max:255'
            ],
            'password' => [
                'required',
                'min:6',
                'confirmed'
            ]
        ];
    }
}
