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
        $country = $this->countryService->get($airport[5]) ?? $airport[5];

        // Build the model.
        $model = new Airport();

        $model->type         = $airport[0];
        $model->iataCode     = $airport[9];
        $model->icaoCode     = $airport[8];
        $model->name         = $airport[1];
        $model->continent    = Continent::getName($airport[4]);
        $model->country      = $country;
        $model->region       = $airport[6];
        $model->municipality = $airport[7];
        $model->latitude     = $airport[2];
        $model->longitude    = $airport[3];
        $model->timezone     = $airport[10];

        return $model;
    }
}
