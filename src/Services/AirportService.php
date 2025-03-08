<?php

namespace THSCD\AeroFetch\Services;

use THSCD\AeroFetch\Factories\AirportFactory;
use THSCD\AeroFetch\Models\Airport;
use THSCD\AeroFetch\Repositories\AirportRepository;

/**
 * The Airport Service.
 *
 * @since 1.0.0
 */
class AirportService
{
    /**
     * The singleton instance.
     *
     * @since {VERSION}
     *
     * @var AirportService|null
     */
    private static ?self $instance = null;

    /**
     * The airport repository.
     *
     * @since 1.1.0
     *
     * @var AirportRepository
     */
    private AirportRepository $repository;

    /**
     * AirportService constructor.
     *
     * @since {VERSION}
     */
    private function __construct()
    {
        $countryService = CountryService::getInstance();
        $airportFactory = new AirportFactory($countryService);

        $this->repository = new AirportRepository($airportFactory);
    }

    /**
     * Get the singleton instance.
     *
     * @since {VERSION}
     *
     * @return AirportService
     */
    private static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Get an airport by IATA code.
     *
     * @since 1.0.0
     *
     * @param string $iataCode The IATA code.
     *
     * @return Airport|array
     */
    public static function get(string $iataCode)
    {
        return self::getInstance()->repository->get($iataCode);
    }

    /**
     * Get airports by field value.
     *
     * @since 1.0.0
     *
     * @param string $field The field name.
     * @param string $value The field value.
     *
     * @return array
     */
    public static function getBy(string $field, string $value)
    {
        return self::getInstance()->repository->getBy($field, $value);
    }
}
