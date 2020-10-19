<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getBookings(Request $request)
    {
        return $request->currentUser;
    }
}
