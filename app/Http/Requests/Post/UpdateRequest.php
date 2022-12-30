<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            "body" => [
                'required',
                'string'
            ],
            "image" => [
                'nullable',
                'string'
            ]
        ];
    }
}
