<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetSeatRequest;
use App\Http\Resources\BookingResource;
use App\Http\Resources\OccupiedSeatFromResource;
use App\Http\Resources\OccupiedSeatsBackResource;
use App\Http\Resources\OccupiedSeatsFromResource;
use App\Http\Resources\PassengerResource;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\Passenger;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function getOne($code)
    {
        $booking = Booking::where(['code' => $code])->first();

        return new BookingResource($booking);
    }

    public function getOccupiedSeats($code)
    {
        $booking = Booking::where(['code' => $code])->first();

        return response()->json([
            'data' => [
                new OccupiedSeatsFromResource($booking->occupiedFrom),
                new OccupiedSeatsBackResource($booking->occupiedBack)
            ]
        ]);
    }

    public function setSeat(SetSeatRequest $request, $code)
    {
        $booking = Booking::where(['code' => $code])->first();
        $passenger = Passenger::find($request->passenger);
        $user = User::where(['api_token' => $request->bearerToken()])->first();

        if ($user->document_number !== $passenger->document_number)
            return response()->json([
                'error' => [
                    'code' => 403,
                    'message' => 'Passenger does not apply to booking'
                ]
            ])->setStatusCode(403, 'Passenger does not aply to booking');

        if ($request->type === 'from' && Passenger::where(['booking_id' => $booking->id, 'place_from' => $request->seat])->first() ||
        $request->type === 'back' && Passenger::where(['booking_id' => $booking->id, 'place_back' => $request->seat])->first())
            return response()->json([
                'error' => [
                    'code' => 422,
                    'message' => 'Seat is occupied'
                ]
            ])->setStatusCode(422, 'Seat is occupied');

        if ($request->type === 'from')
            $passenger->update(['place_from' => $request->seat]);

        if ($request->type === 'back')
            $passenger->update(['place_back' => $request->seat]);

        return new PassengerResource($passenger);
    }

    public function create(Request $request)
    {
        $from = Booking::where([
            'flight_from' => $request->flight_from['id'],
            'flight_back' => $request->flight_back['id'],
            'date_from' => $request->flight_from['date']
        ])->get();
        $fromSum = 0;

        foreach ($from as $f) {
            $fromSum += count(Passenger::where(['booking_id' => $f->id])->get());
        }

        if (Flight::$seats - $fromSum < count($request->passengers)) {
            return response()->json()
                ->setStatusCode(403, 'Booking is unavailable');
        }

        $back = Booking::where([
            'flight_back' => $request->flight_back['id'],
            'flight_from' => $request->flight_from['id'],
            'date_back' => $request->flight_back['date']
        ])->get();
        $backSum = 0;

        foreach ($back as $b) {
            $backSum += count(Passenger::where(['booking_id' => $b->id])->get());
        }

        if (Flight::$seats - $backSum < count($request->passengers)) {
            return response()->json()
                ->setStatusCode(403, 'Booking is unavailable');
        }

        $booking = Booking::create([
            'flight_from' => $request->flight_from['id'],
            'date_from' => $request->flight_from['date'],
            'flight_back' => $request->flight_back['id'],
            'date_back' => $request->flight_back['date'],
            'code' => strtoupper(Str::random(5))
        ]);

        foreach ($request->passengers as $passenger) {
            Passenger::create([
                'booking_id' => $booking->id,
                'first_name' => $passenger['first_name'],
                'last_name' => $passenger['last_name'],
                'birth_date' => $passenger['birth_date'],
                'document_number' => $passenger['document_number']
            ]);
        }

        return response()->json(['data' => ['code' => $booking->code]])->setStatusCode(201);
    }
}
