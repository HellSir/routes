<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_from', 'flight_back', 'date_from',
        'date_back', 'code'
    ];

    public function passengers()
    {
        return $this->hasMany('App\Models\Passenger', 'booking_id', 'id');
    }

    public function flightFrom()
    {
        return $this->hasOne('App\Models\Flight', 'id', 'flight_from');
    }

    public function flightBack()
    {
        return $this->hasOne('App\Models\Flight', 'id', 'flight_back');
    }

    public function occupiedFrom()
    {
        return $this->hasMany('App\Models\Passenger', 'booking_id', 'id')
            ->where('place_from', '!=', null);
    }

    public function occupiedBack()
    {
        return $this->hasMany('App\Models\Passenger', 'booking_id', 'id')
            ->where('place_back', '!=', null);
    }
}
