<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Models\Country;
use App\Models\Day;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        return view('welcome');
    }

    public function show(Trip $trip)
    {
        return view('pages.trip.show');
    }

    public function store(TripRequest $request)
    {
        $this->authorize('store', Trip::class);

        $data= $request->validated();

        if ($request->hasFile('image')){
            $data['image_url'] = saveFileToUploads('image');
        }

        $trip = Trip::create($data);

        foreach ($data['day'] as $day){
            Day::create(
                [
                    'day' => $day['number'],
                    'description' => $day['description'],
                    'trip_id' => $trip->id
                ]
            );
        }

        return redirect('/');
    }

    public function create()
    {
        $this->authorize('create', Trip::class);

        return view('pages.trip.create', [
            'countries' => Country::all()
        ]);
    }
}
