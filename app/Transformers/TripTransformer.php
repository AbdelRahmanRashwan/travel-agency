<?php

namespace App\Transformers;

use App\Models\Trip;
use League\Fractal\TransformerAbstract;

class TripTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'country'
    ];

    /**
     * A Fractal transformer.
     *
     * @param Trip $trip
     * @return array
     */
    public function transform(Trip $trip)
    {
        $data = $trip->toArray();

        $data['start_day'] = $data['start_date'];

        unset($data['start_date']);
        return $data;
    }

    public function includeCountry(Trip $trip)
    {
        return $this->item($trip->country, new CountryTransformer());
    }
}
