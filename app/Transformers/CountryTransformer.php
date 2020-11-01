<?php

namespace App\Transformers;

use App\Models\Country;
use League\Fractal\TransformerAbstract;

class CountryTransformer extends TransformerAbstract
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
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @param Country $country
     * @return array
     */
    public function transform(Country $country)
    {
        $data = $country->toArray();

        $data['name'] = $country['country_name'];
        unset($data['country_name']);

        return $data;
    }
}
