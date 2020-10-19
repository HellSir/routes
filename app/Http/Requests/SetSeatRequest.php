<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetSeatRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'passenger' => 'required|exists:passengers,id',
            'seat' => 'required|size:2',
            'type' => 'required|starts_with:from,back'
        ];
    }
}
