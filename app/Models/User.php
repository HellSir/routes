<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'phone',
        'password', 'document_number', 'api_token'
    ];

    protected $hidden = [
        'password', 'api_token'
    ];

    public function passengers()
    {
        return $this->hasMany('App\Models\Passenger', 'document_number', 'document_number');
    }
}
