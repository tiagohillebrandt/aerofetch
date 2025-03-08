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
     * The country service.
     *
     * @since 1.2.0
     *
     * @var CountryService
     */
    protected CountryService $countryService;

    /**
     * AirportFactory constructor.
     *
     * @since 1.2.0
     *
     * @param CountryService $countryService The country service.
     */
    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    /**
     * Build an airport model.
     *
     * @since 1.1.0
     *
     * @param array $airport The airport data.
     *
     * @return Airport
     */
    public function build(array $airport): Airport
    {
        // Get the country.
        $country = $this->countryService->get($airport[4]) ?? $airport[4];

        // Build the model.
        $model = new Airport();

        $model->iataCode     = $airport[8];
        $model->icaoCode     = $airport[7];
        $model->name         = $airport[0];
        $model->continent    = Continent::getName($airport[3]);
        $model->country      = $country;
        $model->region       = $airport[5];
        $model->municipality = $airport[6];
        $model->latitude     = $airport[1];
        $model->longitude    = $airport[2];
        $model->timezone     = $airport[9];

        return $model;
    }
}
