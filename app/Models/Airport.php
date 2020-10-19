<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    protected $fillable = [
        'city', 'name', 'iata'
    ];

    public function flightsFrom()
    {
        return $this->hasMany('App\Models\Flight', 'from_id', 'id');
    }

    public function flightsTo()
    {
        return $this->hasMany('App\Models\Flight', 'to_id', 'id');
    }
}
