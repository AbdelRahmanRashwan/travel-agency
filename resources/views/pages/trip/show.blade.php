@extends('layouts.app')

@section('content')
    <main role="main">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row" id="trip-div">

                </div>
            </div>
        </div>
    </main>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

    $(document).ready(function (){
        var url = window.location.href;
        var id = url.substring(url.lastIndexOf('/') + 1);
        $.get(`/api/trip/${id}`, function(response){
            var trip = response.trip;
                console.log(trip.image_url, typeof trip.image_url);
                if (!trip.image_url){
                    trip.image_url = 'inheritance2.png';
                }
                var element = `
        <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="/uploads/${trip.image_url}">
            <div class="card-body">
                <p class="card-text">
                    Trip To ${trip.country.name}
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
                document.getElementById('trip-div').appendChild(div);
        })
    });


</script>
