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

        $model->iataCode     = $airport[8];
        $model->icaoCode     = $airport[7];
        $model->name         = $airport[0];
        $model->continent    = Continent::getName($airport[3]);
        $model->country      = CountryService::get($airport[4]) ?? $airport[4];
        $model->region       = $airport[5];
        $model->municipality = $airport[6];
        $model->latitude     = $airport[1];
        $model->longitude    = $airport[2];
        $model->timezone     = $airport[9];

        return $model;
    }
}
