<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlightSearchRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'from' => 'required|exists:airports,iata',
            'to' => 'required|exists:airports,iata',
            'date1' => 'required|date_format:Y-m-d',
            'date2' => 'date_format:Y-m-d',
            'passengers' => 'required|digits_between:1,8'
        ];
    }
}
