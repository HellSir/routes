<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightSearchRequest;
use App\Models\Airport;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\Passenger;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function search(FlightSearchRequest $request)
    {
        $airportFrom = Airport::where(['iata' => $request->from])->first();
        $airportTo = Airport::where(['iata' => $request->to])->first();

        $flights = Flight::where(['from_id' => $airportFrom->id, 'to_id' => $airportTo->id])->get();

        $flightsb = Flight::where(['from_id' => $airportTo->id, 'to_id' => $airportFrom->id])->get();
        $availableFromFlights = [];
        $availableBackFlights = [];

        foreach ($flights as $flight) {
            $from = Booking::where([
                'flight_from' => $flight->id,
                'date_from' => $request->date1
            ])->get();
            $fromSum = 0;

            foreach ($from as $f) {
                $fromSum += count(Passenger::where(['booking_id' => $f->id])->get());
            }

            if (Flight::$seats - $fromSum >= $request->passengers) {
                $availableFromFlights[] = $flight;
            }
        }

        foreach ($flightsb as $flight) {
            $back = Booking::where([
                'flight_back' => $flight->id,
                'date_back' => $request->date2
            ])->get();
            $backSum = 0;

            foreach ($back as $b) {
                $backSum += count(Passenger::where(['booking_id' => $b->id])->get());
            }

            if (Flight::$seats - $backSum >= $request->passengers) {
                $availableBackFlights[] = $flight;
            }
        }

        return response()->json([
            'data'=>[
                'flights_to'=>$availableFromFlights,
                'flights_back'=>$availableBackFlights
            ]
        ]);
    }
}
