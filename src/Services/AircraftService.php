<?php
namespace THSCD\AeroFetch\Services;

use THSCD\AeroFetch\Factories\AircraftFactory;
use THSCD\AeroFetch\Repositories\AircraftRepository;

/**
 * The Aircraft Service.
 *
 * @since {VERSION}
 */
class AircraftService
{
    /**
     * The singleton instance.
     *
     * @since {VERSION}
     *
     * @var AircraftService|null
     */
    private static ?self $instance = null;

    /**
     * The aircraft repository.
     *
     * @since {VERSION}
     *
     * @var AircraftRepository
     */
    private AircraftRepository $repository;

    /**
     * AircraftService constructor.
     *
     * @since {VERSION}
     */
    private function __construct()
    {
        $aircraftFactory = new AircraftFactory();

        $this->repository = new AircraftRepository($aircraftFactory);
    }

    /**
     * Get the singleton instance.
     *
     * @since {VERSION}
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
     * @since {VERSION}
     *
     * @param string $iataCode The IATA code.
     *
     * @return array|null
     */
    public static function get($iataCode): ?array
    {
        return self::getInstance()->repository->get($iataCode);
    }

    /**
     * Get the aircraft by field and value.
     *
     * @since {VERSION}
     *
     * @param string $field The field to search by.
     * @param string $value The value to search for.
     *
     * @return array|null
     */
    public static function getBy($field, $value): ?array
    {
        return self::getInstance()->repository->getBy($field, $value);
    }
}
