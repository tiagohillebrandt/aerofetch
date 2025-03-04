<?php

namespace THSCD\AeroFetch\Factories;

use THSCD\AeroFetch\Helpers\Continent;
use THSCD\AeroFetch\Models\Airport;
use THSCD\AeroFetch\Services\CountryService;

/**
 * The Airport Factory.
 *
 * @since 1.1.0
 */
class AirportFactory
{
    /**
     * Build an airport model.
     *
     * @since 1.1.0
     *
     * @param array $airport The airport data.
     *
     * @return Airport
     */
    public static function build(array $airport): Airport
    {
        $model = new Airport();

        $model->iataCode     = $airport[13];
        $model->icaoCode     = $airport[1];
        $model->name         = $airport[3];
        $model->continent    = Continent::getName($airport[7]);
        $model->country      = CountryService::get($airport[8]) ?? $airport[8];
        $model->region       = $airport[9];
        $model->municipality = $airport[10];
        $model->latitude     = $airport[4];
        $model->longitude    = $airport[5];
        $model->timezone     = $airport[19];

        return $model;
    }
}
