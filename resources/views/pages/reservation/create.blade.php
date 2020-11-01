@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Book a Trip') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('reservation.store', $trip->id) }}" class="row" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="phone_number" class="form-control mt-2" placeholder="Phone Number">
                            @error('phone_number')
                                <p class="text-danger">{{$errors->first('phone_number')}}</p>
                            @enderror
                            <input type="number" name="people_count" class="form-control mt-2" placeholder="Number of People">
                            @error('people_count')
                            <p class="text-danger">{{$errors->first('people_count')}}</p>
                            @enderror
                            <input type="submit" class="btn btn-primary mt-2">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
