<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;
    public static $seats = 60;

    protected $fillable = [
        'flight_code', 'from_id', 'to_id',
        'time_from', 'time_to', 'cost'
    ];

    public function airportFrom()
    {
        return $this->belongsTo('App\Models\Airport', 'from_id', 'id');
    }

    public function airportTo()
    {
        return $this->belongsTo('App\Models\Airport', 'to_id', 'id');
    }

    public function bookingWhereFrom()
    {
        return $this->hasOne('App\Models\Booking', 'flight_from', 'id');
    }

    public function bookingWhereBack()
    {
        return $this->hasOne('App\Models\Booking', 'flight_back', 'id');
    }
}
