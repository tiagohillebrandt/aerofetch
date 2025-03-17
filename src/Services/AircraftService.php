<?php

namespace THSCD\AeroFetch\Services;

use THSCD\AeroFetch\Factories\AircraftFactory;
use THSCD\AeroFetch\Repositories\AircraftRepository;

/**
 * The Aircraft Service.
 *
 * @since 1.3.0
 */
class AircraftService
{
    /**
     * The singleton instance.
     *
     * @since 1.3.0
     *
     * @var AircraftService|null
     */
    private static ?self $instance = null;

    /**
     * The aircraft repository.
     *
     * @since 1.3.0
     *
     * @var AircraftRepository
     */
    private AircraftRepository $repository;

    /**
     * AircraftService constructor.
     *
     * @since 1.3.0
     */
    private function __construct()
    {
        $aircraftFactory = new AircraftFactory();

        $this->repository = new AircraftRepository($aircraftFactory);
    }

    /**
     * Get the singleton instance.
     *
     * @since 1.3.0
     *
     * @return AircraftService
     */
    private static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Get the aircraft by IATA code.
     *
     * @since 1.3.0
     *
     * @param string $iataCode The IATA code.
     *
     * @return array|null
     */
    public static function get(string $iataCode): ?array
    {
        return self::getInstance()->repository->get($iataCode);
    }

    /**
     * Get the aircraft by field and value.
     *
     * @since 1.3.0
     *
     * @param string $field The field to search by.
     * @param string $value The value to search for.
     *
     * @return array|null
     */
    public static function getBy(string $field, string $value): ?array
    {
        return self::getInstance()->repository->getBy($field, $value);
    }
}
