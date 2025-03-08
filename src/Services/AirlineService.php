<?php

namespace THSCD\AeroFetch\Services;

use THSCD\AeroFetch\Factories\AirlineFactory;
use THSCD\AeroFetch\Models\Airline;
use THSCD\AeroFetch\Repositories\AirlineRepository;

/**
 * The Airline Service.
 *
 * @since 1.0.0
 */
class AirlineService
{
    /**
     * The singleton instance.
     *
     * @since 1.2.0
     *
     * @var AirlineService|null
     */
    private static ?self $instance = null;

    /**
     * The airline repository.
     *
     * @since 1.1.0
     *
     * @var AirlineRepository
     */
    private AirlineRepository $repository;

    /**
     * AirlineService constructor.
     *
     * @since 1.2.0
     */
    private function __construct()
    {
        $countryService = CountryService::getInstance();
        $airlineFactory = new AirlineFactory($countryService);

        $this->repository = new AirlineRepository($airlineFactory);
    }

    /**
     * Get the singleton instance.
     *
     * @since 1.2.0
     *
     * @return AirlineService
     */
    private static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Get an airline by IATA code.
     *
     * @since 1.0.0
     *
     * @param string $iataCode The IATA code.
     *
     * @return Airline|null
     */
    public static function get(string $iataCode)
    {
        return self::getInstance()->repository->get($iataCode);
    }

    /**
     * Get an airline by a specific field.
     *
     * @since 1.0.0
     *
     * @param string $field The field to search by.
     * @param string $value The value to search for.
     *
     * @return array|null
     */
    public static function getBy(string $field, string $value)
    {
        return self::getInstance()->repository->getBy($field, $value);
    }
}
