<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReservationController extends Controller
{
    public function index()
    {
        return view('pages.reservation.index', [
            'reservations' => Reservation::where('user_id', Auth::user()->id)->with('trip')->get()
        ]);
    }
}
