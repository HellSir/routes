<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;

Route::post('/register', [AuthController::class, 'register']);//
Route::post('/login', [AuthController::class, 'login']);//
Route::get('/airport', [AirportController::class, 'search']);//
Route::get('/flight', [FlightController::class, 'search']);
Route::get('/booking/{code}', [BookingController::class, 'getOne']);//
Route::post('/booking', [BookingController::class, 'create'])->middleware('auth.api');
Route::get('/user', [AuthController::class, 'getInfo'])->middleware('auth.api');//
Route::get('/booking/{code}/seat', [BookingController::class, 'getOccupiedSeats']);
Route::get('/user/booking', [UserController::class, 'getBookings'])->middleware('auth.api');
Route::patch('/booking/{code}/seat', [BookingController::class, 'setSeat'])->middleware('auth.api');
