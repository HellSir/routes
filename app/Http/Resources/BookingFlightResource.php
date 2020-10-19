<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class BookingFlightResource extends JsonResource
{

    //TODO dates ***************************************************


    public function toArray($request)
    {
        return [
            'flight_id' => $this->id,
            'flight_code' => $this->flight_code,
            'from' => [
                'city' => $this->airportFrom->city,
                'airport' => $this->airportFrom->name,
                'iata' => $this->airportFrom->iata,
                //'date' => $this->bookingWhereFrom->date_from,
                'time' => Carbon::createFromFormat('H:i:s', $this->time_from)->format('h:i')
            ],
            'to' => [
                'city' => $this->airportTo->city,
                'airport' => $this->airportTo->name,
                'iata' => $this->airportTo->iata,
                //'date' => $this->bookingWhereFrom->date_from,
                'time' => Carbon::createFromFormat('H:i:s', $this->time_to)->format('h:i')
            ]
        ];
    }
}
