<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Models\Trip;
use App\Models\User;
use App\Notifications\ReservationCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Trip $trip)
    {
        return view('pages.reservation.create', ['trip' => $trip]);
    }

    public function store(ReservationRequest $request, Trip $trip)
    {
        $data = $request->validated();
        $data['trip_id'] = $trip->id;
        $data['user_id'] = Auth::user()->id;

        $sum = $trip->reservations->sum('people_count');

        if (($trip->max_number - $sum) < $data['people_count'] ){
            return back()->withErrors([
                'people_count' => [
                    'count of people not available'
                ]
            ]);
        }

        $reservation = Reservation::create($data);

        $users = User::where('type', 'admin')->get();

        Notification::send($users, new ReservationCreatedNotification($reservation));

        return redirect('/');
    }

    public function destroy(Reservation $reservation)
    {
        $this->authorize('destroy', [Reservation::class, $reservation]);

        $reservation->delete();

        return redirect('/trip/user');
    }
}
