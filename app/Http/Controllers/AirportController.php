<?php

namespace App\Http\Controllers;

use App\Http\Resources\AirportsResource;
use App\Models\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $airports = Airport::where('city', 'LIKE', '%'.$query.'%')
            ->orWhere('name', 'LIKE', '%'.$query.'%')
            ->orWhere('iata', 'LIKE', '%'.$query.'%')
            ->get();

        return new AirportsResource($airports);
    }
}
