<?php

namespace App\Policies;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservationPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Reservation $reservation)
    {
        if ($reservation->user_id == $user->id){
            return true;
        }
        return false;
    }
}
