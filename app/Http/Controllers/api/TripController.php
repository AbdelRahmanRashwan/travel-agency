<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use App\Transformers\TripTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function index()
    {
        $data = Trip::with(['country', 'reservations'])->get();

        return response()->json(['trips' => fractal($data, new TripTransformer())->parseIncludes('country')]);
    }

    public function show(Trip $trip)
    {
        $trip->load('country');
        return response()->json(['trip' => $trip]);
    }
}
