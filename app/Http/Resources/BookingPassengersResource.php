<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BookingPassengersResource extends ResourceCollection
{
    public function toArray($request)
    {
        return BookingPassengerResource::collection($this->collection);
    }
}
