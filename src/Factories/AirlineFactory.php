<?php

namespace THSCD\AeroFetch\Factories;

use THSCD\AeroFetch\Models\Airline;
use THSCD\AeroFetch\Services\CountryService;

/**
 * The Airline Factory.
 *
 * @since 1.1.0
 */
class AirlineFactory
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
     * AirlineFactory constructor.
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
     * Build an airline model.
     *
     * @since 1.1.0
     *
     * @param array $airline The airline data.
     *
     * @return Airline
     */
    public function build(array $airline): Airline
    {
        // Get the country.
        $country = $this->countryService->getByName($airline[4]) ?? $airline[4];

        // Build the model object.
        $model = new Airline();

        $model->name           = $airline[0];
        $model->iataCode       = $airline[1];
        $model->icaoCode       = $airline[3];
        $model->threeDigitCode = $airline[2];
        $model->country        = $country;

        return $model;
    }
}
