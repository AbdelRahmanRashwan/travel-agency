@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Trip') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('trip.store') }}" class="row" enctype="multipart/form-data">
                            @csrf

                            <select class="form-control col-12" name="country_id" >
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>

                            <input type="number" name="days" class="form-control col-6" placeholder="Days">
                            <input type="number" name="nights" class="form-control col-6" placeholder="Nights">
                            <input type="text" name="hotel_name" class="form-control col-9" placeholder="Hotel Name">
                            <input type="number" name="hotel_rate" class="form-control col-3" placeholder="Hotel Rate">
                            <input type="date" name="start_day" class="form-control col-6">
                            <input type="date" name="end_day" class="form-control col-6">
                            <input type="number" name="max_number" class="form-control col-3" placeholder="Max Number">
                            <input type="number" name="price" class="form-control col-3" placeholder="Price">
                            <input type="file" name="image" class="form-control col-3">

                            <a onclick="addDay()" class="btn btn-primary col-9" >add new day</a>

                            <div id="inputs-div" class="row col-12">

                            </div>

                            <input type="submit" value="Submit" class="btn btn-primary col-12">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<script>
    var count = 0;
    function addDay(){
        var div = document.getElementById('inputs-div');

        var dayInput = document.createElement('input')
        dayInput.name = `day[${count}][number]`;
        dayInput.classList.add('form-control');
        dayInput.classList.add('col-4');
        dayInput.placeholder = "Day";


        var DescInput = document.createElement('input')
        DescInput.name = `day[${count++}][description]`;
        DescInput.classList.add('form-control');
        DescInput.classList.add('col-8');
        DescInput.placeholder = "Description";

        div.append(dayInput, DescInput);
    }


</script>
