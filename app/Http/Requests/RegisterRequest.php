<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|unique:users,phone|string',
            'document_number' => 'required|string|size:10|regex:/^[0-9]+$/',
            'password' => 'required|string'
        ];
    }
}
