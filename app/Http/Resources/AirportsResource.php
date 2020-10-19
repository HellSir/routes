<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AirportsResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'items' => AirportResource::collection($this->collection)
        ];
    }
}
