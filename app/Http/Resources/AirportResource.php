<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AirportResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'city' => $this->city,
            'name' => $this->name,
            'iata' => $this->iata
        ];
    }
}
