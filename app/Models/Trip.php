<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['country_id','days','nights','hotel_name','hotel_rate','start_day'
        ,'end_day','max_number','price','image_url'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function daysArray()
    {
        return $this->hasMany(Day::class);
    }

    public function reservationsSum()
    {
        return $this->hasMany(Reservation::class)
            ->selectRaw('sum(people_count) as sum_reservations, trip_id')
            ->groupBy('trip_id');
    }
}
