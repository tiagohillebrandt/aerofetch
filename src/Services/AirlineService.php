<?php

namespace THSCD\AeroFetch\Services;

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
     * The airline repository.
     *
     * @since 1.1.0
     *
     * @var AirlineRepository
     */
    private static AirlineRepository $repository;

    /**
     * Get the repository.
     *
     * @since 1.1.0
     *
     * @return AirlineRepository
     */
    private static function getRepository()
    {
        return self::$repository ??= new AirlineRepository();
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
        return self::getRepository()->get($iataCode);
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
        return self::getRepository()->getBy($field, $value);
    }
}
