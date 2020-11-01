@extends('layouts.app')

@section('content')
<main role="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row" id="trips-div">

            </div>
        </div>
    </div>
</main>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }
    console.log(readCookie('token'));
    $(document).ready(function (){
        $.ajax({
            url: '/api/trip',
            headers: {
                "Authorization": "Bearer " + readCookie('token')
            }, success: function (response) {
                console.log('test');
                response.trips.data.forEach(trip => {
                    if (!trip.image_url) {
                        trip.image_url = 'inheritance2.png';
                    }
                    var element = `
        <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="/uploads/${trip.image_url}">
            <div class="card-body">
                <p class="card-text">
                    Trip To ${trip.country.data.name}
                </p>
                <p class="card-text">
                    From Date ${trip.start_day} To ${trip.end_day}
                </p>
                <p class="card-text">
                    Hotel Name: ${trip.hotel_name} Rate: ${trip.hotel_rate}
                </p>
                <p class="card-text">
                    Days: ${trip.days} Nights: ${trip.nights}
                </p>
                <h2>${trip.price} EGP</h2>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="/trip/${trip.id}" type="button" class="btn btn-sm btn-outline-success">View</a>
                        <a type="button" class="btn btn-sm btn-outline-warning">Edit</a>
                        </div>
                    <small class="text-muted">9 mins</small>
                </div>
            </div>
        </div>`;
                    var div = document.createElement('div');
                    div.innerHTML = element;
                    div.classList.add('col-md-4');
                    document.getElementById('trips-div').appendChild(div);
                });
            }
        })
    });


</script>


{{--@auth--}}
{{--    @if ($trip->reservations->sum('people_count') != $trip->max_number)--}}
{{--        <a href="/reservation/create/{{$trip->id}}" type="button" class="btn btn-sm btn-outline-primary">Book</a>--}}
{{--    @endif--}}
{{--@endauth--}}
{{----}}
