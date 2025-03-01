<?php

namespace THSCD\AeroFetch\Factories;

use THSCD\AeroFetch\Models\Airline;
use THSCD\AeroFetch\Services\CountryService;

/**
 * The Airline Factory.
 *
 * @since {VERSION}
 */
class AirlineFactory
{
    /**
     * Build an airline model.
     *
     * @since {VERSION}
     *
     * @param array $airline The airline data.
     *
     * @return Airline
     */
    public static function build(array $airline): Airline
    {
        $model = new Airline();

        $model->name           = $airline[0];
        $model->iataCode       = $airline[1];
        $model->icaoCode       = $airline[3];
        $model->threeDigitCode = $airline[2];
        $model->country        = CountryService::getByName($airline[4]) ?? $airline[4];

        return $model;
    }
}
