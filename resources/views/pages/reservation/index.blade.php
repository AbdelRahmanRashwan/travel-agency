@extends('layouts.app')

@section('content')
    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @foreach($reservations as $reservation)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                @if($reservation->trip->image_url)
                                    <img class="card-img-top" src="{{'/uploads/'.$reservation->trip->image_url}}">
                                @else
                                    <img class="card-img-top" src="/uploads/inheritance2.png">
                                @endif

                                <div class="card-body">
                                    <p class="card-text">
                                        Trip To {{$reservation->trip->country->name}}
                                    </p>
                                    <p class="card-text">
                                        From Date {{$reservation->trip->start_day}} To {{$reservation->trip->end_day}}
                                    </p>
                                    <p class="card-text">
                                        Hotel Name: {{$reservation->trip->hotel_name}} Rate: {{$reservation->trip->hotel_rate}}
                                    </p>
                                    <p class="card-text">
                                        Days: {{$reservation->trip->days}} Nights: {{$reservation->trip->nights}}
                                    </p>
                                    <h2>{{$reservation->trip->price}} EGP</h2>
                                    <p>Number of people {{$reservation->people_count}}</p>
                                    <p>Phone: {{$reservation->phone_number}}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a type="button" class="btn btn-sm btn-outline-success">View</a>
                                            <a type="button" class="btn btn-sm btn-outline-warning">Edit</a>
                                        </div>
                                        <form method="post" action="{{route('reservation.destroy', $reservation->id)}}">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-outline-danger" value="cancel reservation">
                                        </form>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
