<?php

namespace App\Policies;

use App\Http\Requests\TripRequest;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class TripPolicy
{
    use HandlesAuthorization;

    public function store()
    {
        if (Auth::user()->type == 'admin'){
            return true;
        }
        return false;
    }

    public function create()
    {
        if (Auth::user()->type == 'admin'){
            return true;
        }
        return false;
    }
}
